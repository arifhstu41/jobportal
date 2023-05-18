<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaymentTrait;
use App\Models\Earning;
use App\Models\PaymentModel;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use ShurjopayPlugin\Shurjopay;
// use ShurjopayPlugin\ShurjopayConfig;
// use ShurjopayPlugin\ShurjopayEnvReader;
use ShurjopayPlugin\PaymentRequest;
use ShurjopayPlugin\Shurjopay;
use ShurjopayPlugin\ShurjopayEnvReader;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class SurjoPayController extends Controller {
    use PaymentTrait;

    public $surjopay_credit_amount;

    function __construct() {

        $this->surjopay_credit_amount = env('SURJOPAY_CREDIT_AMOUNT');

    }

    // make payment
    public function payment(Request $request) {
        $user  = auth('user')->user();
        $price = $this->surjopay_credit_amount;
        if ($user->role == "compnay") {
            $job_payment_type = session('job_payment_type') ?? 'package_job';
            if ($job_payment_type == 'per_job') {
                $price = session('job_total_amount') ?? $this->surjopay_credit_amount;
            } else {
                $plan  = session('plan');
                $price = $plan->price;
            }
        }

        $info = array(
            'amount'         => $price,
            'discountAmount' => 0,
            'discPercent'    => 0,
        );

        $env  = new ShurjopayEnvReader(base_path() . '/.env');
        $conf = $env->getConfig();

        $sp_obj  = new Shurjopay($conf);
        $pay_res = $sp_obj->makePayment($this->paymentRequest($info));
    }

    // make payment request parameters
    public function paymentRequest($info) {
        $request = new PaymentRequest();

        $request->currency = 'BDT';
        // $request->amount   = 10;
        $request->amount              = $info['amount'];
        $request->discountAmount      = $info['discountAmount'] ?? 0;
        $request->discPercent         = $info['discPercent'] ?? 0;
        $request->customerName        = "Welfare Family Bangladesh";
        $request->customerPhone       = "01712644059";
        $request->customerEmail       = "welfare.rmt@gmail.com";
        $request->customerAddress     = 'Rangamati';
        $request->customerCity        = 'Rangamati';
        $request->customerState       = 'Chattogram';
        $request->customerPostcode    = '1207';
        $request->customerCountry     = 'Bangladesh';
        $request->shippingAddress     = 'Rangamati';
        $request->shippingCity        = 'Rangamati';
        $request->shippingCountry     = 'Bangladesh';
        $request->receivedPersonName  = "Welfare Family Bangladesh";
        $request->shippingPhoneNumber = "01712644059";
        $request->value1              = 'value1';
        $request->value2              = 'value2';
        $request->value3              = 'value3';
        $request->value4              = 'value4';
        return $request;
    }

    // verify payments
    public function verifyPayment(Request $request) {
        PaymentModel::create([
            'user_id'  => auth()->user('user')->id,
            'order_id' => $request->order_id,
        ]);

        Earning::create([
            'order_id'                   => rand(1000, 999999999),
            'user_id'                    => auth()->user('user')->id,
            'user_type'                  => (auth()->user()->role == "candidate") ? "candidate" : "company",
            'payment_provider'           => "shurjopay",
            'payment_providers_order_id' => $request->order_id,
            'currency_symbol'            => '৳',
        ]);

        $env                 = new ShurjopayEnvReader(base_path() . '/.env');
        $conf                = $env->getConfig();
        $sp_obj              = new Shurjopay($conf);
        $shurjopay_order_id  = trim($request->order_id);
        $data                = $sp_obj->verifyPayment($shurjopay_order_id);
        $data                = (array) $data[0];
        $data['surjopay_id'] = $data['id'];
        $data['user_id']     = auth()->user('user')->id;
        unset($data['id']);

        PaymentModel::where('order_id', $data['order_id'])
            ->where('user_id', auth()->user('user')->id)
            ->update([
                'surjopay_id'        => $data['surjopay_id'],
                'currency'           => $data['currency'],
                'amount'             => $data['amount'],
                'payable_amount'     => $data['payable_amount'],
                'discount_amount'    => $data['discount_amount'],
                'disc_percent'       => $data['disc_percent'],
                'recived_amount'     => $data['recived_amount'],
                'usd_amt'            => $data['usd_amt'],
                'usd_rate'           => $data['usd_rate'],
                'card_holder_name'   => $data['card_holder_name'],
                'card_number'        => $data['card_number'],
                'phone_no'           => $data['phone_no'],
                'bank_trx_id'        => $data['bank_trx_id'],
                'invoice_no'         => $data['invoice_no'],
                'bank_status'        => $data['bank_status'],
                'customer_order_id'  => $data['customer_order_id'],
                'sp_code'            => $data['sp_code'],
                'sp_message'         => $data['sp_message'],
                'name'               => $data['name'],
                'email'              => $data['email'],
                'address'            => $data['address'],
                'city'               => $data['city'],
                'value1'             => $data['value1'],
                'value2'             => $data['value2'],
                'value3'             => $data['value3'],
                'value4'             => $data['value4'],
                'transaction_status' => $data['transaction_status'],
                'method'             => $data['method'],
                'date_time'          => $data['date_time'],
            ]);

        if ($data['sp_code'] == '1000') {

            $order = Earning::where('payment_providers_order_id', $data['order_id'])
                ->where('user_id', auth('user')->user()->id)
                ->update([
                    'transaction_id' => $data['bank_trx_id'],
                    'amount'         => $data['amount'],
                    'usd_amount'     => $data['usd_amt'],
                    'payment_status' => 'paid',
                ]);

            flashSuccess('Payment Successfull!');
            if (auth()->user()->role == "candidate") {
                $user                     = auth('user')->user();
                $user->candidate->balance = $data['amount'];
                $user->candidate->save();

                // send sms
                sendSMS($user->id, "register");
                return redirect()->route('website.candidate.verification');
            }

            if (auth()->user()->role == "company") {
                if (session('plan')) {
                    $plan    = session('plan');
                    $company = auth()->user()->company;
                    $company->userPlan()->create([
                        'plan_id'                      => $plan->id,
                        'job_limit'                    => $plan->job_limit,
                        'featured_job_limit'           => $plan->featured_job_limit,
                        'highlight_job_limit'          => $plan->highlight_job_limit,
                        'candidate_cv_view_limit'      => $plan->candidate_cv_view_limit,
                        'candidate_cv_view_limitation' => $plan->candidate_cv_view_limitation,
                    ]);
                }

                return redirect()->route('company.dashboard');
            }
        }
        flashError("Payment Failed!");

        return redirect()->route('website.home');
    }

    public function cancelPayment(Request $request) {
        $order_id          = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $data              = $shurjopay_service->verify($order_id);
        flashError("Payment failed!");
        return redirect()->route('website.candidate.payment');
    }

    public function manualPaymentVerification(Request $request) {

        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            dd('no user found with phone ');
            flashError('No user found with this Mobile Number!');
            return back()->withInput();
        }

        $env                = new ShurjopayEnvReader(base_path() . '/.env');
        $conf               = $env->getConfig();
        $sp_obj             = new Shurjopay($conf);
        $shurjopay_order_id = trim($request->order_id);
        $data               = $sp_obj->verifyPayment($shurjopay_order_id);
        $data               = (array) $data[0];
        $data['user_id']    = $user->id;

        if ($data['sp_code'] == '1000') {

            $payment_exists = PaymentModel::where('order_id', $data['order_id'])->exists();
         
            if ($payment_exists) {
                $this->updatePayment($data);
                $this->updateEarning($data);
            } else {
                $this->createPayment($user, $data);
                $this->createEarning($user, $data);
            }

            dd("payment verification successful");
            flashSuccess('Payment verification successfull!');
            return redirect()->back();
        }
    }

    // create payment
    public function createPayment($user, $data) {

        $payment = PaymentModel::create([
            'user_id'            => $user->id,
            'surjopay_id'        => $data['id'],
            'order_id'           => $data['order_id'],
            'currency'           => $data['currency'],
            'amount'             => $data['amount'],
            'payable_amount'     => $data['payable_amount'],
            'discount_amount'    => $data['discount_amount'],
            'disc_percent'       => $data['disc_percent'],
            'recived_amount'     => $data['recived_amount'],
            'usd_amt'            => $data['usd_amt'],
            'usd_rate'           => $data['usd_rate'],
            'card_holder_name'   => $data['card_holder_name'],
            'card_number'        => $data['card_number'],
            'phone_no'           => $data['phone_no'],
            'bank_trx_id'        => $data['bank_trx_id'],
            'invoice_no'         => $data['invoice_no'],
            'bank_status'        => $data['bank_status'],
            'customer_order_id'  => $data['customer_order_id'],
            'sp_code'            => $data['sp_code'],
            'sp_message'         => $data['sp_message'],
            'name'               => $data['name'],
            'email'              => $data['email'],
            'address'            => $data['address'],
            'city'               => $data['city'],
            'value1'             => $data['value1'],
            'value2'             => $data['value2'],
            'value3'             => $data['value3'],
            'value4'             => $data['value4'],
            'transaction_status' => $data['transaction_status'],
            'method'             => $data['method'],
            'date_time'          => $data['date_time'],
        ]);
    }

    // create Earning from order data
    public function createEarning($user, $data) {
        $earning= Earning::create([
            'order_id'                   => rand(1000, 999999999),
            'user_id'                    => $user->id,
            'user_type'                  => $user->role,
            'payment_provider'           => "shurjopay",
            'payment_providers_order_id' => $data['order_id'],
            'currency_symbol'            => '৳',
            'transaction_id'            => $data['bank_trx_id'],
            'amount'         => $data['amount'],
            'usd_amount'     => $data['usd_amt'],
            'payment_status' => 'paid',
        ]);
    }

    // update payment derived from surjopay service
    public function updatePayment($data) {

        PaymentModel::where('order_id', $data['order_id'])
            ->update([
                'surjopay_id'        => $data['id'],
                'currency'           => $data['currency'],
                'amount'             => $data['amount'],
                'payable_amount'     => $data['payable_amount'],
                'discount_amount'    => $data['discount_amount'],
                'disc_percent'       => $data['disc_percent'],
                'recived_amount'     => $data['recived_amount'],
                'usd_amt'            => $data['usd_amt'],
                'usd_rate'           => $data['usd_rate'],
                'card_holder_name'   => $data['card_holder_name'],
                'card_number'        => $data['card_number'],
                'phone_no'           => $data['phone_no'],
                'bank_trx_id'        => $data['bank_trx_id'],
                'invoice_no'         => $data['invoice_no'],
                'bank_status'        => $data['bank_status'],
                'customer_order_id'  => $data['customer_order_id'],
                'sp_code'            => $data['sp_code'],
                'sp_message'         => $data['sp_message'],
                'name'               => $data['name'],
                'email'              => $data['email'],
                'address'            => $data['address'],
                'city'               => $data['city'],
                'value1'             => $data['value1'],
                'value2'             => $data['value2'],
                'value3'             => $data['value3'],
                'value4'             => $data['value4'],
                'transaction_status' => $data['transaction_status'],
                'method'             => $data['method'],
                'date_time'          => $data['date_time'],
            ]);
    }

    // update Earning Order details
    public function updateEarning($data) {
        Earning::where('payment_providers_order_id', $data['order_id'])
            ->update([
                'transaction_id' => $data['bank_trx_id'],
                'amount'         => $data['amount'],
                'usd_amount'     => $data['usd_amt'],
                'payment_status' => 'paid',
            ]);
    }
}

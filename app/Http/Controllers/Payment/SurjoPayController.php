<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaymentTrait;
use App\Models\Earning;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use ShurjopayPlugin\Shurjopay;
// use ShurjopayPlugin\ShurjopayConfig;
// use ShurjopayPlugin\ShurjopayEnvReader;
use ShurjopayPlugin\ShurjopayEnvReader;
use ShurjopayPlugin\Shurjopay;
use ShurjopayPlugin\PaymentRequest;

use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class SurjoPayController extends Controller
{
    use PaymentTrait;

    // make payment
    public function payment(Request $request)
    {
        $user = auth('user')->user();
        if ($user->role == "compnay") {
            $job_payment_type = session('job_payment_type') ?? 'package_job';
            if ($job_payment_type == 'per_job') {
                $price = session('job_total_amount') ?? '175';
            } else {
                $plan  = session('plan');
                $price = $plan->price;
            }
        } else {
            $price = 175;
        }

        $info = array(
            'amount' => $price ?? 10,
            'discountAmount' => 0,
            'discPercent' => 0
        );

        $env = new ShurjopayEnvReader(base_path() . '/.env');
        $conf = $env->getConfig();

        $sp_obj = new Shurjopay($conf);
        $pay_res = $sp_obj->makePayment($this->paymentRequest($info));
    }

    // make payment request parameters
    function paymentRequest($info)
    {
        $request = new PaymentRequest();

        $request->currency = 'BDT';
        //$request->amount =  10;
         $request->amount = $info['amount'] ?? 175;
        $request->discountAmount = $info['discountAmount'] ?? 0;
        $request->discPercent = $info['discPercent'] ?? 0;
        $request->customerName = "Welfare Family Bangladesh";
        $request->customerPhone = "01712644059";
        $request->customerEmail = "welfare.rmt@gmail.com";
        $request->customerAddress = 'Rangamati';
        $request->customerCity = 'Rangamati';
        $request->customerState = 'Chattogram';
        $request->customerPostcode = '1207';
        $request->customerCountry = 'Bangladesh';
        $request->shippingAddress = 'Rangamati';
        $request->shippingCity = 'Rangamati';
        $request->shippingCountry = 'Bangladesh';
        $request->receivedPersonName = "Welfare Family Bangladesh";
        $request->shippingPhoneNumber = "01712644059";
        $request->value1 = 'value1';
        $request->value2 = 'value2';
        $request->value3 = 'value3';
        $request->value4 = 'value4';
        return $request;
    }

    // verify payments
    public function verifyPayment(Request $request)
    {
        $env = new ShurjopayEnvReader(base_path() . '/.env');
        $conf = $env->getConfig();
        $sp_obj = new Shurjopay($conf);

        $order_id            = $request->order_id;
        $data                = $sp_obj->verifyPayment($order_id);
        $data = (array)$data[0];
        $data['surjopay_id'] = $data['id'];
        $data['user_id'] = auth()->user('user')->id;
        unset($data['id']);
        DB::table('payments')->insert($data);

        if($data['sp_massage'] == "Success"){

            $order = Earning::create([
                'order_id' => rand(1000, 999999999),
                'payment_providers_order_id' => $data['order_id'],
                'transaction_id' =>  $data['bank_trx_id'],
                'plan_id' =>  null,
                'user_id' => auth('user')->user()->id,
                'user_type' => (auth()->user()->role == "candidate") ? "candidate" : "company",
                'payment_provider' => 'shurjopay',
                'amount' => $data['amount'],
                'currency_symbol' => '৳',
                'usd_amount' => $data['usd_amt'],
                'payment_status' => 'paid',
                'payment_type' => 'subscription_based',
            ]);

            flashSuccess('Payment Successfull!');
            if (auth()->user()->role == "candidate") {
                $user= auth('user')->user();
                $user->candidate->balance= $data['amount'];
                $user->candidate->save();
                
                // send sms
                sendSMS( $user->id, "register");
                
                return redirect()->route('website.candidate.verification');
            }
    
            if (auth()->user()->role == "company") {
                if (session('plan')) {
                    $plan = session('plan');
                    $company = auth()->user()->company;
                    $company->userPlan()->create([
                        'plan_id'  =>  $plan->id,
                        'job_limit'  =>  $plan->job_limit,
                        'featured_job_limit'  =>  $plan->featured_job_limit,
                        'highlight_job_limit'  =>  $plan->highlight_job_limit,
                        'candidate_cv_view_limit'  =>  $plan->candidate_cv_view_limit,
                        'candidate_cv_view_limitation'  =>  $plan->candidate_cv_view_limitation,
                    ]);
                }
    
                return redirect()->route('company.dashboard');
            }
        }
        flashError("Payment Failed!");
        // return redirect()->back();
        return redirect()->route('website.home');
    }

    public function cancelPayment(Request $request)
    {
        $order_id          = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $data              = $shurjopay_service->verify($order_id);
        flashError("Payment failed!");
        return redirect()->route('website.candidate.payment');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\PaymentModel;
use App\Models\PaymentVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ShurjopayPlugin\Shurjopay;
use ShurjopayPlugin\ShurjopayEnvReader;

class PaymentVerificationController extends Controller {

    public $surjopay_credit_amount;

    /**
     * constructor
     */
    function __construct() {

        $this->surjopay_credit_amount = env('SURJOPAY_CREDIT_AMOUNT');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $payments = PaymentVerification::orderBy('id', "DESC")->paginate(10);
        return view('admin.paymentVerification.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.paymentVerification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $phone = $request->phone;
        $user  = User::where('phone', $phone)->first();

        if ($user) {
            $user_id        = $user->id;
            $transaction_id = $request->transaction_id;
            DB::beginTransaction();
            try {
            $payment_verification = PaymentVerification::where('user_id', $user_id)->where('status', 0)->first();
            $existing_payment= PaymentModel::where('user_id', $user_id)->first();
            
            if (!$payment_verification && $existing_payment) {

                $payment_verification                 = new PaymentVerification();
                $payment_verification->user_id        = $user_id;
                $payment_verification->transaction_id = $request->transaction_id;
                $payment_verification->created_at     = now();
                $payment_verification->status         = 0;
                $payment_verification->save();
            }
            $verify = $this->verifyPayment($user_id);
            if ($verify) {
                $payment_verification->status = 1;
                $payment_verification->save();
                flashSuccess('Payment Verification successful');
            } else {
                flashError('Cannot verify payment, No successful payment found');
            }
            DB::commit();

            return redirect()->route('payment.verification');
            } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            flashError('something went wrong');
            return back()->withInput();
            }
        } else {
            flashError('User not found');
            return back()->withInput();
        }
    }

    public function verifyPayment($user_id) {
        $user    = User::find($user_id);
        $payment = PaymentModel::where('user_id', $user_id)->orderBy('id', 'DESC')->first();

        if ($payment) {
            $env                = new ShurjopayEnvReader(base_path() . '/.env');
            $conf               = $env->getConfig();
            $sp_obj             = new Shurjopay($conf);
            $shurjopay_order_id = trim($payment->order_id);
            $data               = $sp_obj->verifyPayment($shurjopay_order_id);
            $data               = (array) $data[0];
            $data['user_id']    = $user->id;

            // if payment is successful then update candidate balance
            if ($data['sp_code'] == 1000) {
                $this->updatePayment($data);
                $this->updateEarning($data);
                $user->candidate->balance = $data['amount'];
                $user->candidate->save();
            } else {
                return false;
            }
            return true;
        }
        return false;
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
        $earning = Earning::create([
            'order_id'                   => rand(1000, 999999999),
            'user_id'                    => $user->id,
            'user_type'                  => $user->role,
            'payment_provider'           => "shurjopay",
            'payment_providers_order_id' => $data['order_id'],
            'currency_symbol'            => '৳',
            'transaction_id'             => $data['bank_trx_id'],
            'amount'                     => $data['amount'],
            'usd_amount'                 => $data['usd_amt'],
            'payment_status'             => 'paid',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    // cronjob function
    public function verifyPaymentCron() {
        $users = [];
        if (request()->phone) {
            $users[] = User::where('phone', request()->phone)->pluck('id')->first();
        } else {
            $users = PaymentVerification::where('status', 0)->pluck('user_id')->all();
        }
        DB::beginTransaction();
        try {
        foreach ($users as $user_id) {
            /**
             * if payment verification is successful then its ok to continue do nothing
             * else make payment manually
             */
            $verify = $this->verifyPayment($user_id);
            if (!$verify) {
                $user = User::find($user_id);
                if ($user) {
                    $data = $this->makePaymentData($user);
                    $this->createPayment($user, $data);
                    $this->createEarning($user, $data);

                    $user->candidate->balance = $data['amount'];
                    $user->candidate->save();

                    PaymentVerification::where('user_id', $user->id)->update(['status' => 1]);
                }
            }
        }
        DB::commit();
        if(request()->phone){
            flashSuccess('Payment verified successfully');
            return redirect()->back();
        }
        else{
            return true;
        }

        } catch (\Throwable $th) {
            DB::rollBack();
            if(request()->phone){
                flashError('something went wrong');
                return redirect()->back();
            }
            else{
                return false;
            }
        }
    }

    // make payment data
    public function makePaymentData(User $user) {
        $data['id']                 = time();
        $data['order_id']           = "WFB" . time();
        $data['currency']           = "BDT";
        $data['amount']             = $this->surjopay_credit_amount;
        $data['payable_amount']     = $this->surjopay_credit_amount;
        $data['discount_amount']    = 0;
        $data['disc_percent']       = 0;
        $data['recived_amount']     = $this->surjopay_credit_amount;
        $data['usd_amt']            = 0;
        $data['usd_rate']           = 0;
        $data['card_holder_name']   = $user->name;
        $data['card_number']        = "";
        $data['phone_no']           = $user->phone;
        $data['bank_trx_id']        = "";
        $data['invoice_no']         = "";
        $data['bank_status']        = "Success";
        $data['customer_order_id']  = "";
        $data['sp_code']            = 1000;
        $data['sp_message']         = "Success";
        $data['name']               = $user->name;
        $data['email']              = $user->email;
        $data['address']            = "Rangamati";
        $data['city']               = "Rangamati";
        $data['value1']             = "value1";
        $data['value2']             = "value2";
        $data['value3']             = "value3";
        $data['value4']             = "value4";
        $data['transaction_status'] = "Success";
        $data['method']             = "manual";
        $data['date_time']          = date("YYYY-mm-DD H:i:s");

        return $data;
    }
}

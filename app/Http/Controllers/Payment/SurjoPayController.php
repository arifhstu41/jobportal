<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaymentTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use ShurjopayPlugin\Shurjopay;
// use ShurjopayPlugin\ShurjopayConfig;
// use ShurjopayPlugin\ShurjopayEnvReader;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class SurjoPayController extends Controller
{
    use PaymentTrait;
    //

    public function payment( Request $request )
    {
        $user = auth( 'user' )->user();
        if ( $user->role == "compnay" ) {
            $job_payment_type = session( 'job_payment_type' ) ?? 'package_job';
            if ( $job_payment_type == 'per_job' ) {
                $price = session( 'job_total_amount' ) ?? '100';
            } else {
                $plan  = session( 'plan' );
                $price = $plan->price;
            }


        } else{
            $price = 100;
            
            $customer_address= "dhaka";
            $customer_city= "dhaka";
            $customer_email= $user->email;
        }

        

        $converted_amount = currencyConversion( $price );
        $amount           = currencyConversion( $price, null, 'BDT', 1 );
        session( ['order_payment' => [
            'payment_provider' => 'surjopay',
            'amount'           => $amount,
            'currency_symbol'  => '৳',
            'usd_amount'       => $converted_amount,
        ]] );

        $info = array(
            'currency'          => "BDT",
            'amount'            => $price,
            'order_id'          => uniqid(),
            'discount_amount'   => 0,
            'disc_percent'      => 0,
            'client_ip'         => "127.0.0.1",
            'customer_name'     => $user->name,
            'customer_phone'    => $user->phone,
            'customer_email'    => $user->email,
            'customer_address'  => "Daben babu road",
            'customer_city'     => "Khulna",
            'customer_state'    => "Khulna",
            'customer_postcode' => "1212",
            'customer_country'  => "BD",
        );

        $shurjopay_service = new ShurjopayController();
        return $shurjopay_service->checkout($info);

    }

    public function verifyPayment( Request $request )
    {
        $order_id            = $request->order_id;
        $shurjopay_service   = new ShurjopayController();
        $data                = $shurjopay_service->verify( $order_id );
        $data                = json_decode( $data );
        $data                = json_decode( json_encode( $data[0] ), true );
        $data['surjopay_id'] = $data['id'];
        unset( $data['id'] );
        DB::table( 'payments' )->insert( $data );

        if(auth()->user()->role == "candidate"){
            return view('website.pages.candidate.verification');
        }

        if(auth()->user()->role == "company"){
            return redirect()->route('company.dashboard');
        }

        return redirect()->route('website');

        // $this->orderPlacing();

    }

    public function cancelPayment( Request $request )
    {
        $order_id          = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $data              = $shurjopay_service->verify( $order_id );

        dd( $data );
        return view( 'success-page' );

    }
}

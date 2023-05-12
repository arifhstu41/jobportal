<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Earning;
use App\Models\Order;
use Illuminate\Http\Request;
use Modules\Plan\Entities\Plan;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!userCan('order.view'), 403);

        $companies = Company::with('user')->select('id', 'user_id')->get()->makeHidden(['fullteam_size', 'banner_url', 'logo_url']);
        $plans = Plan::all();

        $order_query = Earning::query();

         if (request()->has('payer') && request('payer') != null) {
           
            $order_query->where('user_type', request('payer'));
           
        }

        if (request()->has('from_date') && request('from_date') != null) {
            $order_query->whereDate('created_at', '>=', date('Y-m-d', strtotime(request('from_date'))));
            
        }
        
        if (request()->has('to_date') && request('to_date') != null) {
            $order_query->whereDate('created_at', '<=', date('Y-m-d', strtotime(request('to_date'))));
           
        }

        if (request()->has('provider') && request('provider') != null) {
            $order_query->where('payment_provider', request('provider'));
        }

        if (request()->has('sort_by') && request('sort_by') != null) {
            if (request('sort_by') == 'latest') {
                $order_query->latest();
            } else {
                $order_query->oldest();
            }
        } else {
            $order_query->latest();
        }
        
        $orders = $order_query->with(['user', 'plan', 'manualPayment:id,name'])->paginate(10)->withQueryString();
        

        return view('admin.order.index', compact('orders', 'companies', 'plans'));
    }


    // export pdf
    public function exportPDF(Request $request) {
        
        $companies = Company::with('user')->select('id', 'user_id')->get()->makeHidden(['fullteam_size', 'banner_url', 'logo_url']);
        $plans = Plan::all();

        $order_query = Earning::query();

         if (request()->has('payer') && request('payer') != null) {
           
            $order_query->where('user_type', request('payer'));
           
        }

        if (request()->has('from_date') && request('from_date') != null) {
            $order_query->whereDate('created_at', '>=', date('Y-m-d', strtotime(request('from_date'))));
            
        }
        
        if (request()->has('to_date') && request('to_date') != null) {
            $order_query->whereDate('created_at', '<=', date('Y-m-d', strtotime(request('to_date'))));
           
        }

        if (request()->has('provider') && request('provider') != null) {
            $order_query->where('payment_provider', request('provider'));
        }

        if (request()->has('sort_by') && request('sort_by') != null) {
            if (request('sort_by') == 'latest') {
                $order_query->latest();
            } else {
                $order_query->oldest();
            }
        } else {
            $order_query->latest();
        }
        
        $orders = $order_query->get();
        
        $filters = [
            "payer"                 => @$request->payer,
            "from_date"                 => @$request->from_date,
            "to_date"                  => @$request->to_date,
            "provider"                    => @$request->provider
        ];

        // pdf part started
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData          = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf ([
            'format'       => 'A4',
            'fontDir'      => array_merge($fontDirs, [public_path() . '/fonts']),
            'fontdata'     => $fontData + [
                'bangla' => [
                    'R'          => 'Siyamrupali.ttf',
                    'B'          => 'Siyamrupali.ttf',
                    'I'          => 'Siyamrupali.ttf',
                    'BI'         => 'Siyamrupali.ttf',
                    'useOTL'     => 0xFF,
                    'useKashida' => 75,
                ],
            ],
            'default_font' => 'bangla',
        ]);

        $stylesheet = public_path('css/custom.css'); // external css
        $page       = view('admin.order.pdf_view', compact('orders', 'filters')); //table part
        $mpdf->WriteHTML($stylesheet, 1);
        $title = "Order List.pdf";
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML('<img src="images/pad.png" alt="Welfare Pad" style="width: 100%; border: 2px solid #2e3397; border-bottom: none" >');
        $mpdf->WriteHTML($page);
        $mpdf->SetHTMLFooter('<span style="color: #2e3397">© 2023 Welfare Family Bangladesh All Rights Reserved.</span>');
        $mpdf->Output($title, 'I');
    }

    public function show($id)
    {
        abort_if(!userCan('order.view'), 403);
        $order = Earning::with('plan', 'user', 'manualPayment:id,name')->find($id);

        return view('admin.order.show', compact('order'));
    }
}

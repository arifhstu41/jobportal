<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Earning;
use App\Models\Setting;
use App\Models\Candidate;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Modules\Location\Entities\Country;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }


    public function dashboard()
    {
        session(['layout_mode' => 'left_nav']);
        $jobs = Job::withoutEdited()->get();

        $data['all_jobs'] = $jobs->count();
        $data['active_jobs'] = $jobs->where('status', 1)->count();
        $data['expire_jobs'] = $jobs->where('status', 0)->count();
        $data['pending_jobs'] = $jobs->where('status', 2)->count();

        $data['verified_users'] = User::whereNotNull('email_verified_at')->count();
        $data['candidates'] = Candidate::all()->count();
        $data['companies'] = Company::all()->count();
        $data['earnings'] = currencyConversion(Earning::sum('usd_amount'), 'USD', config('jobpilot.currency'));
        $data['email_verification'] = setting('email_verification');

        $months = Earning::select(
            \DB::raw('MIN(created_at) AS created_at'),
            \DB::raw('sum(usd_amount) as `amount`'),
            \DB::raw("DATE_FORMAT(created_at,'%M') as month")
        )
            ->where("created_at", ">", \Carbon\Carbon::now()->startOfYear())
            ->orderBy('created_at')
            ->groupBy('month')
            ->get();


        $earnings = $this->formatEarnings($months);
        $latest_jobs = Job::withoutEdited()->with(['company', 'job_type', 'experience'])->latest()->get()->take(10);

        $popular_countries = DB::table('jobs')
            ->select('country', DB::raw('count(*) as total'))
            ->orderBy('total', 'desc')
            ->groupBy('country')
            ->limit(10)
            ->get();

        $popular_countries;

        $latest_earnings = Earning::with('plan', 'manualPayment:id,name')->latest()->take(10)->get();

        $users = User::select(['id', 'name', 'email', 'role', 'status', 'email_verified_at', 'created_at', 'image', 'username'])->latest()->take(10)->get();

        return view('admin.index', compact('data', 'earnings', 'popular_countries', 'latest_jobs', 'latest_earnings', 'users'));
    }

    public function notificationRead()
    {

        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return response()->json(true);
    }

    public function allNotifications()
    {

        $notifications = auth()->user()->notifications()->paginate(20);

        return view('admin.notifications', compact('notifications'));
    }

    private function formatEarnings(object $data)
    {
        $amountArray = [];
        $monthArray = [];

        foreach ($data as $value) {
            array_push($amountArray, $value->amount);
            array_push($monthArray, $value->month);
        }

        return ['amount' => $amountArray, 'months' => $monthArray];
    }

    public function downloadTransactionInvoice(Earning $transaction)
    {
        // $data['transaction'] = $transaction->load('plan', 'company.user.contactInfo');

        // $pdf = PDF::loadView('website.pages.company.invoice', $data)->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);

        // return $pdf->stream("invoice_" . $transaction->order_id . ".pdf");
        $transaction = $transaction->load('plan', 'company.user.contactInfo');
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf       = new \Mpdf\Mpdf([
            'format' => 'A4',
            'fontDir' => array_merge($fontDirs, [public_path() . '/fonts',]),
            'fontdata' => $fontData + [ // lowercase letters only in font key
                'bangla' => [
                    'R'  => 'Siyamrupali.ttf', // regular font
                    'B'  => 'Siyamrupali.ttf', // optional: bold font
                    'I'  => 'Siyamrupali.ttf', // optional: italic font
                    'BI' => 'Siyamrupali.ttf', // optional: bold-italic font
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ]
            ],
            'default_font' => 'bangla',
        ]);
        $stylesheet = public_path('css/invoice.css'); // external css
        $mpdf->WriteHTML($stylesheet, 1);
        $code = view('website.pages.company.invoice', compact('transaction')); //table part
        $title = "invoice.pdf";
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML($code);
        $mpdf->Output($title, 'I');

    }
}

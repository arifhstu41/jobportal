<?php

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\Log;
use App\Models\Setting;
use App\Models\smsHistory;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Modules\Language\Entities\Language;
use Modules\Location\Entities\Country;
use Modules\Seo\Entities\Seo;
use msztorc\LaravelEnv\Env;
use Stevebauman\Location\Facades\Location;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Torann\GeoIP\Facades\GeoIP;

// =====================================================
// ===================Image Function====================
// =====================================================
if (!function_exists('uploadImage')) {
    function uploadImage($file, $path) {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/uploads/' . $path . '/'), $fileName);
        return "uploads/$path/" . $fileName;
    }
}

/**
 * image delete
 *
 * @param string $image
 * @return void
 */
if (!function_exists('deleteFile')) {
    function deleteFile( ? string $image) {
        $imageExists = file_exists($image);

        if ($imageExists) {
            if ($imageExists != 'backend/image/default.png') {
                @unlink($image);
            }
        }
    }
}

/**
 * image delete
 *
 * @param string $image
 * @return void
 */
if (!function_exists('deleteImage')) {
    function deleteImage( ? string $image) {
        $imageExists = file_exists($image);

        if ($imageExists) {
            if ($imageExists != 'backend/image/default.png') {
                @unlink($image);
            }
        }
    }
}

/**
 * @param UploadedFile $file
 * @param null $folder
 * @param string $disk
 * @param null $filename
 * @return false|string
 */
if (!function_exists('uploadOne')) {
    function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null) {
        $name = !is_null($filename) ? $filename : uniqid('FILE_') . dechex(time());

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            $disk
        );
    }
}

/**
 * @param null $path
 * @param string $disk
 */
if (!function_exists('deleteOne')) {
    function deleteOne($path = null, $disk = 'public') {
        Storage::disk($disk)->delete($path);
    }
}

if (!function_exists('uploadFileToStorage')) {
    function uploadFileToStorage($file, string $path) {
        $file_name = $file->hashName();
        Storage::putFileAs($path, $file, $file_name);
        return $path . '/' . $file_name;
    }
}

if (!function_exists('uploadFileToPublic')) {
    function uploadFileToPublic($file, string $path) {
        if ($file && $path) {
            $name = time().rand(1,100).".". $file->extension();
            $path= $file->move(public_path().'/uploads' . $path, $name);
            $url= $path->getFilename();
        } else {
            $url = null;
        }
        return $url;
    }
}

// =====================================================
// ===================Env Function====================
// =====================================================
if (!function_exists('envReplace')) {
    function envReplace($name, $value) {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $name . '=' . env($name),
                $name . '=' . $value,
                file_get_contents($path)
            ));
        }

        if (file_exists(App::getCachedConfigPath())) {
            Artisan::call("config:cache");
        }
    }
}

if (!function_exists('setEnv')) {
    function setEnv($key, $value) {
        if ($key && $value) {
            $env = new Env();
            $env->setValue($key, $value);
        }

        if (file_exists(App::getCachedConfigPath())) {
            Artisan::call("config:cache");
        }
    }
}

if (!function_exists('checkSetEnv')) {

    function checkSetEnv($key, $value) {
        if ((env($key) != $value)) {
            setEnv($key, $value);
        }
    }
}

if (!function_exists('error')) {
    function error($name, $class = 'is-invalid') {
        $errors = session()->get('errors', app(ViewErrorBag::class));

        return $errors->has($name) ? $class : '';
    }
}

if (!function_exists('allowLaguageChanage')) {
    function allowLaguageChanage() {
        return Setting::first()->language_changing ? true : false;
    }
}

// ========================================================
// ===================Response Function====================
// ========================================================

/**
 * Response success data collection
 *
 * @param object $data
 * @param string $responseName
 * @return \Illuminate\Http\Response
 */
if (!function_exists('responseData')) {
    function responseData( ? object $data, string $responseName = 'data') {
        return response()->json([
            'success'     => true,
            $responseName => $data,
        ], 200);
    }
}

/**
 * Response success data collection
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
if (!function_exists('responseSuccess')) {
    function responseSuccess(string $msg = "Success") {
        return response()->json([
            'success' => true,
            'message' => $msg,
        ], 200);
    }
}

/**
 * Response error data collection
 *
 * @param string $msg
 * @param int $code
 * @return \Illuminate\Http\Response
 */
if (!function_exists('responseError')) {
    function responseError(string $msg = 'Something went wrong, please try again', int $code = 404) {
        return response()->json([
            'success' => false,
            'message' => $msg,
        ], $code);
    }
}

/**
 * Response success flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
if (!function_exists('flashSuccess')) {
    function flashSuccess(string $msg) {
        session()->flash('success', $msg);
    }
}

/**
 * Response error flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
if (!function_exists('flashError')) {
    function flashError(string $message = 'Something went wrong') {
        return session()->flash('error', $message);
    }
}

/**
 * Response warning flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
if (!function_exists('flashWarning')) {
    function flashWarning(string $message = 'Something went wrong', bool $custom = false) {
        if ($custom) {
            return session()->flash('warning', $message);
        } else {
            return session()->flash('warning', $message);
        }
    }
}

// ========================================================
// ===================Others Function====================
// ========================================================
if (!function_exists('setting')) {
    function setting($fields = null, $append = false) {
        if ($fields) {
            $type = gettype($fields);

            if ($type == 'string') {
                $data = $append ? Setting::first($fields) : Setting::value($fields);
            } elseif ($type == 'array') {
                $data = Setting::first($fields);
            }
        } else {
            $data = Setting::first();
        }

        if ($append) {
            $data = $data->makeHidden(['dark_logo_url', 'light_logo_url', 'favicon_image_url']);
        }

        return $data;
    }
}

if (!function_exists('autoTransLation')) {
    function autoTransLation($lang, $text) {
        $tr         = new GoogleTranslate($lang);
        $afterTrans = $tr->translate($text);
        return $afterTrans;
    }
}

/**
 * user permission check
 *
 * @param string $permission
 * @return boolean
 */
if (!function_exists('userCan')) {
    function userCan($permission) {
        return auth('admin')->user()->can($permission);
    }
}

if (!function_exists('pdfUpload')) {
    function pdfUpload( ? object $file, string $path) : string{
        $filename = time() . '.' . $file->extension();
        $filePath = public_path('uploads/' . $path);
        $file->move($filePath, $filename);

        return $filePath . $filename;
    }
}

if (!function_exists('remainingDays')) {

    function remainingDays($deadline) {
        $now   = Carbon::now();
        $cDate = Carbon::parse($deadline);
        return $now->diffInDays($cDate);
    }
}

if (!function_exists('jobStatus')) {
    function jobStatus($deadline) {
        $now   = Carbon::now();
        $cDate = Carbon::parse($deadline);

        if ($now->greaterThanOrEqualTo($cDate)) {
            return 'Expire';
        } else {
            return 'Active';
        }
    }
}

if (!function_exists('socialMediaShareLinks')) {

    function socialMediaShareLinks(string $path, string $provider) {
        switch ($provider) {
        case 'facebook' :
            $share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $path;
            break;
        case 'twitter' :
            $share_link = 'https://twitter.com/intent/tweet?text=' . $path;
            break;
        case 'pinterest' :
            $share_link = 'http://pinterest.com/pin/create/button/?url=' . $path;
            break;
        }
        return $share_link;
    }
}

if (!function_exists('livejob')) {

    function livejob() {
        $livejobs = Job::where('status', 'active')->count();
        return $livejobs;
    }
}

if (!function_exists('companies')) {

    function companies() {
        $companies = Company::count();
        return $companies;
    }
}

if (!function_exists('newjob')) {

    function newjob() {
        $newjobs = Job::where('status', 'active')->where('created_at', '>=', Carbon::now()->subDays(7)->toDateString())->count();
        return $newjobs;
    }
}

if (!function_exists('candidate')) {
    function candidate() {
        $candidates = Candidate::count();
        return $candidates;
    }
}
if (!function_exists('linkActive')) {
    function linkActive($route, $class = 'active') {
        return request()->routeIs($route) ? $class : '';
    }
}

if (!function_exists('candidateNotifications')) {
    function candidateNotifications() {
        return auth()->user()->notifications()->take(6)->get();
    }
}

if (!function_exists('candidateNotificationsCount')) {

    function candidateNotificationsCount() {

        return auth()->user()->notifications()->count();
    }
}

if (!function_exists('candidateUnreadNotifications')) {

    function candidateUnreadNotifications() {
        return auth()->user()->unreadNotifications()->count();
    }
}

if (!function_exists('companyNotifications')) {

    function companyNotifications() {

        return auth()->user()->notifications()->take(6)->get();
    }
}

if (!function_exists('companyNotificationsCount')) {
    function companyNotificationsCount() {
        return auth()->user()->notifications()->count();
    }
}

if (!function_exists('companyUnreadNotifications')) {

    function companyUnreadNotifications() {

        return auth()->user()->unreadNotifications()->count();
    }
}

if (!function_exists('defaultCurrencySymbol')) {
    function defaultCurrencySymbol() {
        return config('zakirsoft.app_currency_symbol');
    }
}

if (!function_exists('currencyAmountShort')) {

    function currencyAmountShort($amount) {
        $num   = $amount * getCurrencyRate();
        $units = ['', 'K', 'M', 'B', 'T'];
        for ($i = 0; $num >= 1000; $i++) {
            $num /= 1000;
        }

        return round($num, 0) . $units[$i];
    }
}

/**
 * Remove the decimal numbers and shorten
 *
 * @param   number $amount
 * @return  string
 */
if (!function_exists('zeroDecimal')) {
    function zeroDecimal($amount) {
        $units = ['', 'K', 'M', 'B', 'T'];
        for ($i = 0; $amount >= 1000; $i++) {
            $amount /= 1000;
        }

        return round($amount, 0) . $units[$i];
    }
}

/**
 * Currency exchange
 *
 * @param $amount
 * @param $from
 * @param $to
 * @param $round
 *
 * @return number
 */
if (!function_exists('currencyExchange')) {
    function currencyExchange($amount, $from = null, $to = null, $round = 2) {
        $from = currentCurrencyCode();
        $to   = config('zakirsoft.currency', 'USD');

        return AmrShawky\Currency::convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->round($round)
            ->get();
    }
}

if (!function_exists('currencyConversion')) {
    function currencyConversion($amount, $from = null, $to = null, $round = 2) {
        $from = $from ?? config('zakirsoft.currency');
        $to   = $to ?? 'USD';

        return Currency::convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->round($round)
            ->get();
    }
}

/**
 * Currency rate store in session
 *
 * @return void
 */
if (!function_exists('currencyRateStore')) {
    function currencyRateStore() {
        if (session()->has('currency_rate')) {
            $currency_rate = session('currency_rate');
            $from          = config('zakirsoft.currency');
            $to            = currentCurrencyCode();

            if ($currency_rate['from'] != $from || $currency_rate['to'] != $to) {
                $rate = AmrShawky\Currency::convert()->from($from)->to($to)->amount(1)->get();
                session(['currency_rate' => ['from' => $from, 'to' => $to, 'rate' => $rate]]);
            }
        } else {
            $from = config('zakirsoft.currency');
            $to   = currentCurrencyCode();

            $rate = AmrShawky\Currency::convert()->from($from)->to($to)->amount(1)->get();
            session(['currency_rate' => ['from' => $from, 'to' => $to, 'rate' => $rate]]);
        }
    }
}

/**
 * Get currency rate
 *
 * @return number
 */
if (!function_exists('getCurrencyRate')) {
    function getCurrencyRate() {
        if (session()->has('currency_rate')) {
            $currency_rate = session('currency_rate');
            $rate          = $currency_rate['rate'];
            return $rate;
        } else {
            return 1;
        }
    }
}

/**
 * Get current Currency
 *
 * @return object
 */
if (!function_exists('currentCurrency')) {
    function currentCurrency() {
        return session('current_currency') ?? Currency::where('code', config('jobpilot.currency'))->first();
    }
}

/**
 * Get current Currency code
 *
 * @return string
 */
if (!function_exists('currentCurrencyCode')) {
    function currentCurrencyCode() {
        if (session()->has('current_currency')) {
            $currency = session('current_currency');
            return $currency->code;
        }

        return config('zakirsoft.currency');
    }
}

if (!function_exists('currentLanguage')) {

    function currentLanguage() {
        return session('current_lang');
    }
}

if (!function_exists('langDirection')) {

    function langDirection() {
        return session('current_lang')->direction ?? Language::where('code', config('zakirsoft.default_language'))->value('direction');
    }
}

if (!function_exists('metaData')) {

    function metaData($page) {
        $current_language = currentLanguage(); // current session language
        $language_code    = $current_language ? $current_language->code : 'en'; // language code or default one
        $page             = Seo::where('page_slug', $page)->first(); // get page
        $exist_content    = $page->contents()->where('language_code', $language_code)->first(); // get page content orderBy page && language
        $content          = '';
        if ($exist_content) {
            $content = $exist_content;
        } else {
            $content = $page->contents()->where('language_code', 'en')->first();
        }

        return $content; // return response
    }
}

if (!function_exists('storePlanInformation')) {

    function storePlanInformation() {
        session()->forget('user_plan');
        session(['user_plan' => auth('user')->user()->company->userPlan]);
    }
}

if (!function_exists('formatTime')) {

    function formatTime($date, $format = 'F d, Y H:i A') {
        return Carbon::parse($date)->format($format);
    }
}

if (!function_exists('inspireMe')) {

    function inspireMe() {
        Artisan::call('inspire');
        return Artisan::output();
    }
}

if (!function_exists('getUnsplashImage')) {
    function getUnsplashImage() {
        $url = "https://source.unsplash.com/random/1920x1280/?park,mountain,ocean,sunset,travel";
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch); // $a will contain all headers
    }
}

if (!function_exists('adminNotifications')) {
    function adminNotifications() {
        return auth('admin')->user()->notifications()->take(10)->get();
    }
}

if (!function_exists('adminUnNotifications')) {

    function adminUnNotifications() {
        return auth('admin')->user()->unreadNotifications()->count();
    }
}

if (!function_exists('checkMailConfig')) {

    function checkMailConfig() {
        $status = config('mail.mailers.smtp.transport') && config('mail.mailers.smtp.host') && config('mail.mailers.smtp.port') && config('mail.mailers.smtp.username') && config('mail.mailers.smtp.password') && config('mail.mailers.smtp.encryption') && config('mail.from.address') && config('mail.from.name');

        !$status ? flashError('Mail not sent for the reason of incomplete mail configuration') : '';
        return $status ? 1 : 0;
    }
}

if (!function_exists('openJobs')) {

    function openJobs() {
        return Job::where('status', 'active')->where('deadline', '>=', Carbon::now()->toDateString())->count();
    }
}

if (!function_exists('updateMap')) {
    function updateMap($data) {
        $location = session()->get('location');

        if ($location) {
            $region  = array_key_exists("region", $location) ? $location['region'] : '';
            $country = array_key_exists("country", $location) ? $location['country'] : '';
            $address = Str::slug($region . '-' . $country);

            $data->update([
                'address'      => $address,
                'neighborhood' => array_key_exists("neighborhood", $location) ? $location['neighborhood'] : '',
                'locality'     => array_key_exists("locality", $location) ? $location['locality'] : '',
                'place'        => array_key_exists("place", $location) ? $location['place'] : '',
                'district'     => array_key_exists("district", $location) ? $location['district'] : '',
                'postcode'     => array_key_exists("postcode", $location) ? $location['postcode'] : '',
                'region'       => array_key_exists("region", $location) ? $location['region'] : '',
                'country'      => array_key_exists("country", $location) ? $location['country'] : '',
                'long'         => array_key_exists("lng", $location) ? $location['lng'] : '',
                'lat'          => array_key_exists("lat", $location) ? $location['lat'] : '',
            ]);
            session()->forget('location');
        }

        return true;
    }
}

if (!function_exists('selected_country')) {
    function selected_country() {
        $selected_country = session()->get('selected_country');
        $country          = Country::find($selected_country);

        return $country;
    }
}

if (!function_exists('get_file_size')) {
    function get_file_size($file) {
        if (file_exists($file)) {
            $file_size = File::size($file) / 1024 / 1024;
            return round($file_size, 4) . ' MB';
        }

        return '0 MB';
    }
}

/**
 * Increases or decreases the brightness of a color by a percentage of the current brightness.
 *
 * @param   string  $hexCode        Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`
 * @param   float   $adjustPercent  A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
 *
 * @return  string
 *
 * @author  maliayas
 */
if (!function_exists('adjustBrightness')) {
    function adjustBrightness($hexCode, $adjustPercent) {
        $hexCode = ltrim($hexCode, '#');

        if (strlen($hexCode) == 3) {
            $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
        }

        $hexCode = array_map('hexdec', str_split($hexCode, 2));

        foreach ($hexCode as &$color) {
            $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
            $adjustAmount    = ceil($adjustableLimit * $adjustPercent);

            $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
        }

        return '#' . implode($hexCode);
    }
}

if (!function_exists('current_country_code')) {
    function current_country_code() {
        if (selected_country()) {
            $country_code = selected_country()->sortname;
        } else {
            $setting = Setting::first();

            if ($setting->app_country_type != 'multiple_base') {
                $country_code = Country::find($setting->app_country)->sortname;
            } else {
                return '';
            }
        }

        return $country_code;
    }
}

/**
 * Set ip wise country, currency and language
 *
 * @return  void
 */
if (!function_exists('setLocationCurrency')) {
    function setLocationCurrency() {
        $ip = request()->ip();
        // $ip = '103.102.27.0'; // Bangladesh
        // $ip = '105.179.161.212'; // Mauritius
        // $ip = '197.246.60.160'; // Egypt
        // $ip = '107.29.65.61'; // United States"
        // $ip = '46.39.160.0'; // Czech Republic
        // $ip = "94.112.58.11"; // Czechia

        if ($ip && $ip != '127.0.0.1') {
            $geo = GeoIP::getLocation($ip);

            // Set the currency
            if (!session()->has('current_currency')) {
                $currency = Modules\Currency\Entities\Currency::where('code', $geo->currency)->first() ?? Modules\Currency\Entities\Currency::where('code', config('zakirsoft.currency'))->first();

                if ($currency) {
                    session(['current_currency' => $currency]);
                } else {
                    session(['current_currency' => Modules\Currency\Entities\Currency::first()]);
                }
            }

            // Set the language
            if (!session()->has('current_lang')) {
                $path                      = base_path('public/json/country_currency_language.json');
                $country_language_currency = json_decode(file_get_contents($path), true);
                $key                       = array_search($geo->iso_code, array_column($country_language_currency, 'code'));
                $country_language_currency = $country_language_currency[$key];
                $lang_code                 = $country_language_currency['language']['code'];
                $language                  = Language::where('code', $lang_code)->first();

                if ($language) {
                    session(['current_lang' => $language]);
                } else {
                    session(['current_lang' => Language::where('code', config('zakirsoft.default_language'))->first()]);
                }
            }

            // Set the country
            // $selected_country = session('country_code');
            $selected_country = session('selected_country');

            if (!session()->has('selected_country')) {
                // if (!session()->has('country_code')) {
                if ($selected_country != 'all') {
                    if ($ip) {
                        $current_user_data = Location::get($ip);
                    }
                    if ($current_user_data) {
                        $user_country = $current_user_data->countryName;
                        if ($user_country) {
                            $database_country = Country::where('name', $user_country)->where('status', 1)->first();
                            if ($database_country) {
                                // $selected_country = session()->get('country_code');
                                $selected_country = session()->get('selected_country');
                                if (!$selected_country) {
                                    // session()->put('country_code', $database_country->sortname);
                                    session()->put('selected_country', $database_country->id);
                                    return true;
                                }
                            }
                        }
                    }
                }
            } else {
                // $selected_country = session('country_code');
                $selected_country = session('selected_country');
            }
        }
    }
}

/**
 * @param String $date
 * Date format
 */
if (!function_exists('getLanguageByCode')) {
    function getLanguageByCode($code) {
        return Language::where('code', $code)->value('name');
    }
}

/**
 * @param String $date
 * Date format
 */
if (!function_exists('currentLangCode')) {
    function currentLangCode() {
        if (session('current_lang')) {
            return session('current_lang')->code;
        } else {
            return Language::where('code', config('zakirsoft.default_language'))->value('code');
        }
    }
}

/**
 * @param String $date
 * Date format
 */
if (!function_exists('dateFormat')) {
    function dateFormat($date, $format = 'F Y') {
        return \Carbon\Carbon::createFromFormat($format, $date)->toDateTimeString();
    }
}

/* Currency position
 *
 * @param String $date
 */
if (!function_exists('currencyPosition')) {
    function currencyPosition($amount) {
        $symbol   = config('jobpilot.currency_symbol');
        $position = config('jobpilot.currency_position');

        if ($position == 'left') {
            return $symbol . ' ' . $amount;
        } else {
            return $amount . ' ' . $symbol;
        }

        return $amount;
    }
}

/**
 * Authenticate candidate
 */
if (!function_exists('currentCandidate')) {
    function currentCandidate() {
        return auth('user')->user()->candidate;
    }
}

/**
 * Authenticate candidate
 */
if (!function_exists('currentCompany')) {
    function currentCompany() {
        return auth('user')->user()->company;
    }
}

/* Get format number for currency
 *
 * @param String $path
 */
if (!function_exists('getFormattedNumber')) {
    function getFormattedNumber(
        $value,
        $currencyCode = 'USD',
        $locale = 'en_US',
        $style = NumberFormatter::DECIMAL,
        $precision = 0,
        $groupingUsed = true
    ) {
        $currencyCode = currentCurrencyCode();
        $formatter    = new NumberFormatter($locale, $style);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $precision);
        $formatter->setAttribute(NumberFormatter::GROUPING_USED, $groupingUsed);
        if ($style == NumberFormatter::CURRENCY) {
            $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, $currencyCode);
        }

        return $formatter->format($value * getCurrencyRate());
    }
}

/**
 * Checks jobs status like highlighted or featured
 * @param string $date
 * @return boolean
 *
 */
if (!function_exists('isFuture')) {
    function isFuture($date = null): bool {

        if ($date) {
            return Carbon::parse($date)->isFuture();
        }

        return false;
    }
}

/**
 * Send SMS to candidates through elitbuzz api
 * @param int candidate_id, job_id
 * @return boolean
 *
 */
if (!function_exists('sendSMS')) {
    function sendSMS($user_id, $content_type, $job_id = null, $sms_content = null): bool{
        $user      = User::find($user_id);
        $url       = env("SMS_API_URL");
        $api_key   = env('SMS_API_KEY');
        $type      = "unicode";
        $phone     = "88" . $user->phone;
        $sender_id = env('SMS_SENDER_ID');
        switch ($content_type) {
        case 'register':
            $content = "ওয়েলফেয়ার জব পোর্টালে রেজিষ্ট্রেশন করার জন্য আপনাকে অভিনন্দন";
            break;

        case 'apply':
            $content = "আপনার চাকরির আবেদন সফলভাবে গ্রহণ করা হয়েছে এবং পরবর্তী প্রক্রিয়ার জন্য My Welfare App অথবা www.welfarebd.org থেকে রেজিষ্ট্রেশন করুন";
            break;

        case 'interview':
            $content = "অভিনন্দন,আপনি ইন্টারভিউয়ের জন্য নির্বাচিত হয়েছেন, আপনার জন্য শুভ কামনা";
            break;

        case 'otp':
            $content = "আপনার ভেরিফিকেশন কোডটি হলো-" . $sms_content;
            break;

        case 'password_reset':
            $content = "আপনার পাসওয়ার্ড সফলভাবে পরিবর্তন হয়েছে";
            break;

        case 'custom':
            $content = $sms_content;
            break;

        default:
            $content = "ওয়েলফেয়ার জব পোর্টালে আপনাকে স্বাগতম";
            break;
        }
        // if($content_type){
        //     $template = DB::table('sms_content')->where("content_type", $content_type)->first();
        // }
        // if ($sms_content != null) {
        //     $content = $sms_content;
        //     if($content_type == "otp"){
        //         $content= $sms_content." is Your OTP for password reset. Do not share your OTP/PIN with others.";
        //     }
        // } else {
        //     $content = "জব পোর্টালে আপনাকে স্বাগতম";
        //     if ($content_type == "apply") {
        //         $content = "চাকরিতে আবেদনের জন্য ধন্যবাদ";
        //     }
        // }

        $data = [
            "api_key"  => $api_key,
            "type"     => $type,
            "contacts" => $phone,
            "senderid" => $sender_id,
            "msg"      => $content,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        // dd($response);

        $statusList['1000'] = "Message Sent";
        $statusList['1002'] = "Sender Id/Masking Not Found";
        $statusList['1003'] = "API Not Found";
        $statusList['1004'] = "SPAM Detected";
        $statusList['1005'] = "Internal Error";
        $statusList['1006'] = "Internal Error";
        $statusList['1007'] = "Balance Insufficient";
        $statusList['1008'] = "Message is empty";
        $statusList['1009'] = "Message Type Not Set (text/unicode)";
        $statusList['1010'] = "Invalid User & Password";
        $statusList['1011'] = "Invalid User Id";
        $statusList['1012'] = "Invalid Number";
        $statusList['1013'] = "API limit error";
        $statusList['1014'] = "No matching template";
        $statusList['1015'] = "SMS Content Validation Fails";
        $statusList['2001'] = "UnKnown Error";
        // $response= "1000";
        $response_code = $response;

        if (strlen($response) > 4) {
            $response_code = 1000;
        }
        $response_meaning = $statusList[$response_code];

        smsHistory::create([
            'user_id'          => $user_id,
            'phone'            => $phone,
            'response_code'    => $response_code,
            'response_meaning' => $response_meaning,
            'sms_content_id'   => 1,
        ]);

        return true;
    }
}

/**
 * generate 12 digit Username starting with WFB
 * @param int length
 * @return boolean
 *
 */
if (!function_exists('generateUserName')) {
    function generateUserName($length = 12) {
        $characters       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        $username = "WFB" . $randomString;

        $oldUserName = User::where('username', $username)->first();
        if ($oldUserName) {
            generateUserName(12);
        }
        return $username;
    }

}

if (!function_exists('setInputLog')) {
    function setInputLog($data, $table_name) {
        $files     = [];
        if ($data->picture) {
            $picture = $data->picture;
            $files[] = $picture->getPathName();
        }
        if ($data->signature) {
            $signature= $data->signature;
            $files[] = $signature->getPathName();
        }
        $alldata = [
            'inputs' => $data->all(),
            'files'  => $files,
        ];
        $log = Log::create([
            'user_id'      => auth()->user()->id,
            'content_type' => 'application-form',
            'content'      => json_encode($alldata),
            'table_name'   => $table_name,
        ]);
        info("input log set=".$log);
        return $log;
    }
}

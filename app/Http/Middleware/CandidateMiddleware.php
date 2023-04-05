<?php

namespace App\Http\Middleware;

use App\Models\Candidate;
use Closure;
use Illuminate\Http\Request;

class CandidateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth('user')->user()->role == 'candidate') {
            $candidate = Candidate::where('user_id', auth('user')->user()->id)->first();
            if ($candidate->balance == 0) {
                return redirect()->route('website.candidate.payment');
            }
            if ($candidate->is_varified == "false") {
                return redirect()->route('website.candidate.verification');
            }
            if ($candidate->profile_complete != 0) {
                return redirect()->route('website.candidate.application.form');
            }
            return $next($request);
        }

        if (auth('user')->user()->role == 'company') {

            return redirect()->route('company.dashboard');
        }

        return redirect()->route('login');
    }
}

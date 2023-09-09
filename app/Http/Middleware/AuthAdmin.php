<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            $userInfo = auth()->user();
            $data['name'] = $userInfo['name'];
            $time = Carbon::now()->locale('vi');
            $time->settings(['formatFunction' => 'translatedFormat']);

            $data['greating'] = __('common.greating.' . $time->format('a'));

            // var_dump( $time->format('g:i A l jS F Y'));die;
            View::share('user', $data);
            return $next($request);
        }

        return redirect()->route('login');
    }
}

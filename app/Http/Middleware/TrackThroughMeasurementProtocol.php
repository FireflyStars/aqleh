<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class TrackThroughMeasurementProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $uuid = (string) Str::uuid();

        $gamp = GAMP::setClientId($uuid);
        $gamp->setDocumentPath('/' . $request->path());
        $gamp->setDocumentReferrer($request->server('HTTP_REFERER', ''));
        $gamp->setUserAgentOverride($request->server('HTTP_USER_AGENT'));

        // Override the sent IP with the IP from the current request.
        // Otherwhise the servers IP would be sent.
        $gamp->setIpOverride($request->ip());
        $gamp->sendPageview();        
        return $next($request);
    }
}

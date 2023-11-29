<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContattoRuolo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$requiredRuoli): Response
    {
        //   echo 'sono in contatto ruolo';
        //  print_r($requiredRuoli);
        abort_if(0 === count(array_intersect($requiredRuoli, $request["ruoliUtente"])),403);
        return $next($request);
    }
}
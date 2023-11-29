<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Utente;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\v1\AccediController;

class Autenticazione
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) //, $regola): Response //next è il parametro per far uscire i dati
    {

        // $token = $_SERVER['HTTP_AUTHORIZATION'];
        // $token = trim(str_replace("Bearer", "", $token));

        $token = null;
        if (isset($_SERVER['HTTP_AUTHORIZATION']) && $_SERVER['HTTP_AUTHORIZATION'] !== null) {
            //non funziona su Apache ma su artisan serve si
            $token = $_SERVER['HTTP_AUTHORIZATION'];
            $token = trim(str_replace("Bearer", "", $token));
        } elseif (isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_PW'] !== null) {
            // Il codice sopra necessita di modifiche al server Apache
            // usare col server Apache
            $token = $_SERVER['PHP_AUTH_PW'];
        }
// echo ("TOKEN ".$token);
        $payload = AccediController::verificaToken($token);
        
        if ($payload != null) {
            $utente = Utente::where("idUtente", $payload->data->idUtente)->firstOrFail();
            if ($utente->idStato == 1) {
                Auth::login($utente);
                
                $request["ruoliUtente"] = $utente->ruoli->pluck('ruolo')->toArray();
                // print_r($request ['ruoliUtente']);
                //echo 'siamo qua';
                return $next($request);
                
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\AdminPolicy\AdminPolicy as AdminPolicy;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //il middleware è definito nella rotta.
    //nel gruppo admin
    //la richiesta qui deve essere request.

    public function handle(Request $request, Closure $next)
    {
        //verifica sia stata fatta l'autenticazione
        if(!(Auth::check())){
            return redirect('/user/login');
        }
        else{
            //se si acquisisci l'utente loggato
            $user = Auth::user();
            //acquisisci il numero di id
            $id = $user->getAuthIdentifier();
            //invoca il metedo creato nella policy per verificare sia l'amministratore
            $checkPolicy = AdminPolicy::checkPolicy($id);
            //la policy ritorna true se lo è
            //e ritorna alla home con i parametri della richiesta e
            //consenti l'accesso alle rotte admin
            if($checkPolicy == true){
                return $next($request);
            }
            else{
                //altrimenti torna alla home ma non consente l'accesso
                //all'area amministratore
                //ovvero tutte le rotte definite con questo middleware
                return redirect('/?'.$checkPolicy);
            }

        }
    }
}

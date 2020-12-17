<?php

namespace App\Policies\AdminPolicy;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\Types\Array_;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() { }

    public static function checkPolicy(int $id)
    {
        //definisci l'array
        $selectedRoles = array();
        //acquisisci l'utente dall'id passato
        $adm = User::whereId($id)->firstOrFail();
        //acquisisci il ruolo dell'utente
        $selectedRoles = $adm->roles()->pluck('name')->toArray();

        //il metodo pluck restituisce un array di dati del campo name
        // acquisiti dal metodo roles del model USer.
        //l'array è di un solo valore e contiente il dato corrispondente
        //al ruolo della tabella model_has_roles in corrispondenza del'id
        //dell'utente. se è amministratore, ritorna true

        if($selectedRoles[0] == "amministratore"){
            return true;
        }
        else{
            return false;
        }
    }
}

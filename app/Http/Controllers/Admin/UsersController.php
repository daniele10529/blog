<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('backend.users.edit',compact('user','roles','selectedRoles'));
    }

    //la richiesta viene generata in automatico come parametro Request
    //si deve passare la request creata appositamente.
    //la reqeust, ottiene i parametri passati con la richiesta get
    //e ne valida il contenuto
    public function update(UserEditFormRequest $request, $id)
    {
        //attraverso il model User, ottengo i dati dal DB
        //I metodi sono ereditati e quindi non presenti direttamente nel model
        //where rappresenta la clausula where mysql
        //firstOrFail() estrae il primo dato trovato
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if($password != ""){
            $user->password = Hash::make($password);
        }
        //inserisce i dati nel DB e inserisce i dati nella tabella model_has_roles con cui è relazioneta
        //c'è una relazione molti a molti con utente
        //la relazione è creata direttamente dal package laravel\ui
        $user->save();
        $user->syncRoles($request->get('role'));
        return redirect(action('App\Http\Controllers\Admin\UsersController@edit',$user->id))->
        with('status','Permessi inseriti correttamente');
    }
}

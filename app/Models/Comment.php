<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //si definisce il nome della tabella oltre al campo da non pienare di dati
    protected $table = "comment";
    protected $guarded = ['id'];

    public function post(){
        //essendo una relazione di tipo polimorfica, basta definirla senza specificare il model.
        //il tutto è già definito nel model Post, che richiama questo metodo
        //return $this->morphMany('App\Models\Comment','post');
        return $this->morphTo();
    }
}

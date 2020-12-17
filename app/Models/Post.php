<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //specifica quale campo non deve essere compilato dai dati,
    //id è in autoincrement, tutti gli altri campi devono essere pienati
    //con fillable vanno specificati i campi da compilare
    //E' obbligatorio specificare
    protected $guarded = ['id'];

    public function categories()
    {
        //definisce la relazione molti a molti con la tabella categories
        //definita dal model category
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function comment()
    {
        //definisce una relazione polimorfica che consente ti utilizzare una tabella
        //già esistente e sfruttata da un'altro model.
        //si passa il model con cui è relazionata la tabella e il
        //metodo dove è definita la relazione
        return $this->morphMany('App\Models\Comment','post');
    }

    public function users()
    {
        //definisce una relazione uno a molti, prendendo in considerazione
        //solo il primo elemento corrispondente
        return $this->belongsTo(User::class,'user_id')->take(1);
    }

    public function img()
    {
        //definisce una relazione uno a molti, prendendo in considerazione
        //solo il primo elemento corrispondente.
        //viene specificata la chiave esterna di relazione
        //il model può essere passato come percorso o come
        //istanza della classe come in questo caso
        return $this->hasMany(Image::class,'post_id')->take(1);
    }
}

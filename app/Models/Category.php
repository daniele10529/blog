<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function post()
    {
        //la relazione deve ovviamente essere definita in entrambi i
        //model. metodo categories() del model Post corrispondente
        //in questo caso sincronizzo anche la data di creazione del post
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }
}

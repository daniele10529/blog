<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $table = "ticket";
    protected $fillable = ['title','content','slug','status','user_id'];

    public function comment(){
        return $this->hasMany('App\Models\Comment','post');
    }
    
    
}

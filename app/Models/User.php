<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'password', 'first_name', 'last_name', 'role_id'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }

    public function log($content){
        if(Storage::disk("local")->exists("log.txt")){
            Storage::append("log.txt",$content);
        }
        else{
            Storage::disk("local")->put("log.txt",$content);
        }
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['name','email','contact','photo'];

    function payment(){
        return $this->hasMany(Payment::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

     // Table Name
     protected $table = 'admin';
     // Primary Key
     public $primaryKey = 'id';
     // Timestamps
     public $timestamps = true;
 
     protected $guarded = [
         'id',
     ];
     
}

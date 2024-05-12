<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

     // Table Name
     protected $table = 'user';
     // Primary Key
     public $primaryKey = 'id';
     // Timestamps
     public $timestamps = true;
 
}

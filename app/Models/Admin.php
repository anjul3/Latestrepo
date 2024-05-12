<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    
    // Set to true if your table has 'created_at' and 'updated_at' columns
    public $timestamps = true;
}


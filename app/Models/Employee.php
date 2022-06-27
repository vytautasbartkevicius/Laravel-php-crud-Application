<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'email';
    public $incrementing = false; 
    
    protected $fillable = ['company_name','first_name','last_name','email','phone'];
}

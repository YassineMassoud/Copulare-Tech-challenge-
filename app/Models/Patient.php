<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'doctor',
        'hospital_entry',
        'hospital_exit',
        'symptom'
    ];
}

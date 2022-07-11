<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;
    protected $table = 'datasets';
    protected $fillable = [
        'introduction',
        'diagnosis',
        'anamnesis',
        'physical_examination',
        'summary',
        'medication',
        'diagnostics',
        'patient_id',
        'date',
        'doctor_details',
        'practitioner_address',
        'other_examination',
        'following_therapy',
        'laboratory_results'
    ];
}

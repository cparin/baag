<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPatientConnection extends Model
{
    protected $fillable = [
        'token',
        'patient_id',
        'doctor_id',
        'status',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

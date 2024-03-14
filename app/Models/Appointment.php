<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_type_id',
        'status',
        'date',
        'time',
        'doctor_id',
        'price',
        'rememberToken',
    ];


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function testType()
    {
        return $this->belongsTo(TestType::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

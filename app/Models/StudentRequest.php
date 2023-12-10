<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'student_id',
        'year_section',
        'document',
        'no_copy',
        'payment_method',
        'amount',
        'status',
        'transaction_date',
    ];
}

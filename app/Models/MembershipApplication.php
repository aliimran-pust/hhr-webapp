<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_bn',
        'name_en',
        'father_name',
        'mother_name',
        'batch_passing_year',
        'present_address',
        'permanent_address',
        'job_description',
        'mobile',
        'email',
        'occupation',
        'group',
        't_shirt_size',
        'photo',
        'interested_in_guests',
        'guest_count',
        'guest_details',
        'payment_receipt_copy',
        'transaction_id',
        'application_status',
        'total_amount'
    ];

    protected $casts = [
        'guest_details' => 'array',
    ];
}

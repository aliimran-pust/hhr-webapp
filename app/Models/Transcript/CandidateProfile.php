<?php

namespace App\Models\Transcript;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_bn', 'name_en', 'mother_name', 'father_name', 'spouse_name',
        'dob', 'nationality', 'present_address', 'permanent_address',
        'department', 'hall', 'reg_no', 'session', 'session_started',
        'exam_held', 'degree_awarded', 'year', 'nid', 'birth_certificate', 'passport'
    ];
}

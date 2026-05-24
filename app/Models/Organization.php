<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable=[
        'logo',
        'letter',
        'organization_name',
        'organization_type',
        'organization_owner',
        'organization_email',
        'organization_phone',
        'organization_province',
        'organization_motivation',
        'is_valid',
        'is_testimonial'
    ];
        protected $casts = ['is_testimonial' => 'boolean', 'is_valid' => 'boolean'];
}

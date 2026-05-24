<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

     protected $fillable = [
        'photo',
     'name',
     'lastname',
     'firstname',
     'gender',
     'birth_date',
     'email',
     'phone',
     'province_id',
     'country_residence',
     'city_district',
     'address',
     'motivation', 
     'preferred_language',
     'is_testimonial'
        
    ];

    protected $casts = ['is_individual' => 'boolean'];

     public function province() {
        return $this->belongsTo(Province::class);
    }
}

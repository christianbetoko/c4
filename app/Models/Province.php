<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        
       
    ];
    protected $casts = [
        'status' => 'boolean'
    ];
    public function individuals() {
        return $this->hasMany(Individual::class);
    }
}

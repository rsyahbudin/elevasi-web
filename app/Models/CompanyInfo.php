<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'short_description',
        'full_description',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'instagram',
        'legalitas',
    ];
}

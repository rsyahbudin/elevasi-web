<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'client_id',
        'title',
        'slug',
        'description',
        'location',
        'project_date',
        'featured_image',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array',
        'project_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

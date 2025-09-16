<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    protected $table = 'resumes';

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'email',
        'address',
        'linkedin',
        'about',
        'photo_path',
        'work_experiences',
        'educations',
        'skills',
        'certifications',
        'references',
    ];

    protected $casts = [
        'work_experiences' => 'array',
        'educations' => 'array',
        'skills' => 'array',
        'certifications' => 'array',
        'references' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

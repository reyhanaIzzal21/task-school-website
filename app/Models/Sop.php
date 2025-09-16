<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $table = 'sops';
    protected $fillable = [
        'title',
        'content',
        'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

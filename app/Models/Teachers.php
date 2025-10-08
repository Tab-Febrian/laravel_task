<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    /** @use HasFactory<\Database\Factories\TeachersFactory> */
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(\App\Models\Subjects::class, 'subject_id');
    }
}

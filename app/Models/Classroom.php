<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    protected $table = 'classrooms';
    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(\App\Models\Students::class, 'classroom_id');
    }
}

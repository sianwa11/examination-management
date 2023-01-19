<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Relationships */

    public function class_students()
    {
        return $this->hasMany(ClassStudents::class, 'class_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relationships
     */
    public function cats()
    {
        return $this->hasOne(Cats::class);
    }

    public function final_grades()
    {
        return $this->hasOne(FinalGrade::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudents extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Relationships */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
}

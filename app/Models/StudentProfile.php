<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'year_level',
        'address',
    ];

    protected $casts = [
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

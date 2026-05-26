<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholarship_id',
        'student_id',
        'status',
        'remarks',
        'submitted_documents',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'submitted_documents' => 'array',
    ];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

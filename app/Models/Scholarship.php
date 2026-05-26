<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'title',
        'description',
        'slots',
        'eligibility_criteria',
        'year_level',
        'deadline',
        'status',
    ];

    protected $casts = [
        'eligibility_criteria' => 'array',
        'year_level' => 'array',
        'deadline' => 'datetime',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open')->where('deadline', '>', now());
    }

    public function scopeWithAvailableSlots($query)
    {
        return $query->whereRaw('slots > (SELECT COUNT(*) FROM applications WHERE applications.scholarship_id = scholarships.id AND applications.status = ?)', ['approved']);
    }

    public function getIsFull()
    {
        $approvedCount = $this->applications()->where('status', 'approved')->count();
        return $approvedCount >= $this->slots;
    }

    public function scopeByLocation($query, $location)
    {
        return $query->whereJsonContains('eligibility_criteria->locations', $location);
    }

    public function scopeByCourse($query, $course)
    {
        return $query->whereJsonContains('eligibility_criteria->courses', $course);
    }
}

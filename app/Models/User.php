<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    
    // Relationship to the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'username', 'student_id');
    }

    // Relationship to the Course model through the Enrollment pivot table
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_code', 'username', 'course_code');
    }

    // Relationship to the Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'username', 'employee_id');
    }

    // Relationship to the Course model through the Teacher model
    public function courses1()
    {
        return $this->hasManyThrough(Course::class, Teacher::class, 'employee_id', 'employee_id', 'username', 'employee_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'employee_id'; // Define the primary key column
    public $incrementing = false; // Disable auto-incrementing for the primary key

    protected $fillable = [
        'employee_id', 'name','ualification','year_experience','status', 'email' // Specify the columns that are fillable
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'employee_id', 'employee_id');
    }
}

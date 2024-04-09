<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Batch;
use App\Models\User;
use App\Models\Schedule;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = [
        'course_id',
        'batch_id',
        'instructor_id',
        'date',
    ];


    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id'); // Specify the foreign key 'instructor_id'
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}

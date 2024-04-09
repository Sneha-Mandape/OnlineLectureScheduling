<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'batches';
    protected $fillable =[
        'course_id',
        'batch_name',
        ];

        public function schedules()
        {
            return $this->hasMany(Schedule::class);
        }

        public function course()
        {
            return $this->belongsTo(Course::class);
        }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'level', 'description', 'image'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}

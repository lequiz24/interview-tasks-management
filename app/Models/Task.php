<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class, 'task_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public function tasks()
    {
        return $this->hasMany(Task::class, 'status_id');
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class, 'status_id');
    }
}
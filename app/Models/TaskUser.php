<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $table = 'task_users';

    public function tasks()
    {
        return $this->hasMany(UserTask::class, 'user_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    protected $table = 'user_tasks';

    public function user()
    {
        return $this->belongsTo(TaskUser::class, 'user_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

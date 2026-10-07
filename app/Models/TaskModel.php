<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at', 'is_archived'];

    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->where('is_archived', 0)
                    ->findAll();
    }

    public function getAllTasksOrdered()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'ASC')
                    ->findAll();
    }
}
<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /**
     * 指定ユーザーの全タスク取得
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->tasks()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

    public function all() {
        return Task::all();
    }
}

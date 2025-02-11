<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class DeleteByIdCommand extends Command
{
    protected $signature = 'app:delete-task {id : Task ID to delete}';
    protected $description = 'Delete a task by ID';

    public function handle()
    {
        if ($task = Task::find($this->argument('id'))) {
            $task->delete();
            $this->info("Task deleted.");
        } else {
            $this->error("Task not found.");
        }
    }
}

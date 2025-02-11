<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class CreateTaskCommand extends Command
{
    protected $signature = 'app:create-task {description : Task description} {--completed : Mark task as completed}';
    protected $description = 'Create a new task';

    public function handle()
    {
        $description = $this->argument('description');
        $isCompleted = $this->option('completed') ? 1 : 0;

        $task = Task::create([
            'description' => $description,
            'is_completed' => $isCompleted,
        ]);

        $this->info("Task '{$task->description}' created successfully.");
    }
}

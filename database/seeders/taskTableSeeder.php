<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class taskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = Task::where('title', 'test')->first();

        if (!$task) {
            $task = new Task();
            $task->title = 'test';
            $task->description = 'test';
            $task->assignedTo = 2;
            $task->entryBy = 1;
            $task->save();
        }
    }
}

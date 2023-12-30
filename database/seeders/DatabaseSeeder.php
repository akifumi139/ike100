<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' =>  config('app.user-name'),
            'password' => Hash::make(config('app.user-password')),
        ]);

        // Project::create([
        //     "no" => 1,
        //     "status" => "実行",
        //     "title" => "プロジェクト１",
        //     "body" => "プロジェクト１",
        // ]);

        // Project::create([
        //     "no" => 2,
        //     "status" => "実行",
        //     "title" => "プロジェクト2",
        //     "body" => "プロジェクト2",
        // ]);

        // Project::create([
        //     "no" => 3,
        //     "status" => "実行",
        //     "title" => "プロジェクト3",
        //     "body" => "プロジェクト3",
        // ]);

        // Task::create([
        //     "project_id" => 1,
        //     "name" => "達成項目１",
        // ]);
        // Task::create([
        //     "project_id" => 1,
        //     "name" => "達成項目2",
        // ]);
        // Task::create([
        //     "project_id" => 1,
        //     "name" => "達成項目2",
        // ]);
    }
}

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
            'name' => 'test',
            'password' => Hash::make('password'),
        ]);

        Project::create([
            "title" => "プロジェクト１",
            "body" => "プロジェクト１",
        ]);

        Project::create([
            "title" => "プロジェクト2",
            "body" => "プロジェクト2",
        ]);

        Project::create([
            "title" => "プロジェクト3",
            "body" => "プロジェクト3",
        ]);

        Task::create([
            "project_id" => 1,
            "name" => "達成項目１",
        ]);
        Task::create([
            "project_id" => 1,
            "name" => "達成項目2",
        ]);
        Task::create([
            "project_id" => 1,
            "name" => "達成項目2",
        ]);
    }
}

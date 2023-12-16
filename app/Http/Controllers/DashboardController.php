<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view("dashboard.index", compact("projects"));
    }

    public function show()
    {
    }
}

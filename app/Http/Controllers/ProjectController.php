<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('type')->paginate(5);
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::with('type')->find($id);
        if (!$project)
            return response(status: 404);

        return response()->json($project);
    }

    public function getProjectsByType(string $id)
    {
        $type = Type::find($id);
        $projects = $type->projects;
        $total = count($projects);

        return response()->json(compact('type', 'projects', 'total'));
    }
}

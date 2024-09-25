<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::with('user')->orderBy('name','asc')->orderBy('id','desc')->paginate(20);
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('project.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $validated_data = $request->validated();

        // Project::create( $validated_data );
    
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        // return redirect('/project'); -- uses URL instead of route name

        return redirect()->route('project.index')
            ->with('success', "Project <strong>{$project->name} ({$project->id})</strong> has been created");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $users = User::all();
        return view('project.edit', compact('project','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {

        // -- if using normal Illuminate/Http/Request not ProjectUpdateRequest
        // $validated_data = $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'user_id' => 'required'
        // ]);

        $validated_data = $request->validated();

        $project->update( $validated_data );

        // -- manual update specific columns only
        // $project->update([
        //     'name' => $validated_data['name']
        // ]);

        // -- sample if need to update records from multiple tables
        // $user = User::find($validated_data['user_id'] );
        // $user = User::where('id', $validated_data['user_id'] )->first();
        // $user->update([
        //     'updated_at' => now()
        // ]);

        return redirect()->route('project.index')
            ->with('success', "Project {$project->name} [{$project->id}] has been updated.") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $p_name = $project->name;
        $p_id = $project->id;
        $project->delete();

        return redirect()->route('project.index')
            ->with('success', "Project {$p_name} [{$p_id}] has been updated.") ;
    }

    public function destroyMany(Request $request) {
        // dd($request);

        $request->validate([
            'delete_ids' => 'required|array',
            'delete_ids.*' => 'exists:projects,id'
        ]);

        Project::destroy( $request->delete_ids );

        return redirect()->route('project.index')
            ->with('success', "Projects has been deleted") ;

    }
}

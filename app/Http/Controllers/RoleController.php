<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // if ($request->user()->cannot('update')) {
        //     abort(403);
        // }

        Gate::authorize('viewAny', Role::class);

        $roles = Role::all();
        return view('role.index', compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Role::class);
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('create', Role::class);

        $validatedData = $request->validated();
        // Create a new role with the validated data
        $role = Role::create($validatedData);

        // Optionally, you can redirect to the index page or show the newly created role
        return redirect()->route('role.index')->with('success', 'Role created successfully');    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('update', $role);

        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        Gate::authorize('update', $role);

        $validatedData = $request->validated();
        $role->update($validatedData);
        return redirect()->route('role.edit', $role->id)->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}

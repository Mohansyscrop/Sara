<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $query = Permission::with('roles');

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $permissions = $query->paginate(15)->withQueryString();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => strtolower($validated['name']), 'guard_name' => 'web']);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission "' . $permission->name . '" created successfully.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission->update(['name' => strtolower($validated['name'])]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $name = $permission->name;
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission "' . $name . '" deleted successfully.');
    }
}

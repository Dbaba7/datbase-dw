<?php

namespace App\Http\Controllers\Admin;

use App\\Http\\Controllers\\Controller;\nuse App\\Models\\Officer;\nuse App\\Models\\User;\nuse Illuminate\\Http\Request;\n\nclass OfficerController extends Controller\n{\n    /**\n     * Display a listing of the resource.\n     */\n    public function index()\n    {\n        $officers = Officer::all();\n        return view(\'admin.officers.index\', compact(\'officers\'));\n    }\n\n    /**\n     * Show the form for creating a new resource.\n     */\n    public function create()\n    {\n        $users = User::whereDoesntHave(\'officer\')->get();\n        return view(\'admin.officers.create\', compact(\'users\'));\n    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id', 'unique:officers,user_id'],
            'rank' => ['required', 'string', 'max:255'],
            'badge_number' => ['required', 'string', 'max:255', 'unique:officers,badge_number'],
            'phone_number' => ['required', 'string', 'max:255'],
            'station' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($request->user_id);

        Officer::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'rank' => $request->rank,
            'badge_number' => $request->badge_number,
            'phone_number' => $request->phone_number,
            'station' => $request->station,
        ]);

        return redirect()->route('admin.officers.index')->with('success', 'Officer created successfully.');
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
    public function edit(Officer $officer)
    {
        $users = User::all();
        return view('admin.officers.edit', compact('officer', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officer $officer)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id', 'unique:officers,user_id,'.$officer->id],
            'rank' => ['required', 'string', 'max:255'],
            'badge_number' => ['required', 'string', 'max:255', 'unique:officers,badge_number,'.$officer->id],
            'phone_number' => ['required', 'string', 'max:255'],
            'station' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($request->user_id);

        $officer->update([
            'user_id' => $user->id,
            'name' => $user->name,
            'rank' => $request->rank,
            'badge_number' => $request->badge_number,
            'phone_number' => $request->phone_number,
            'station' => $request->station,
        ]);

        return redirect()->route('admin.officers.index')->with('success', 'Officer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officer $officer)
    {
        $officer->delete();

        return redirect()->route('admin.officers.index')->with('success', 'Officer deleted successfully.');
    }
}

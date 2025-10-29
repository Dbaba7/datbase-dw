<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function store(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'Roles updated successfully.');
    }
}

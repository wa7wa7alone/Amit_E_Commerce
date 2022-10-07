<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserInfoController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        // if (!$user)
        //     return redirect(route('users.myaccount'))->with('error', 'No Profile Found!');

        // $skills = Skill::select('id', 'name')->get();
        return view('user.myaccount', compact('user'));
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            ...User::$rules1,
            'email' => 'required|email:rfc,dns|unique:users,email,'. $id,
        ]);

        $validated = array_filter($validated);

        $user = User::find($id);
        if (!empty($validated['image'])) {
            // Delete Old image if not the default image
            if ($user->image != 'users/avatar.png') Storage::delete($user->image);
            // upload new image
            $validated['image'] = $request->file('image')->store('public/users');
        }

        $user->update($validated);

        // $user->skills()->sync($validated['skills']);

        return redirect(route('user.home'));
    }



}

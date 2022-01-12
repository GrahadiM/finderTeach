<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }
    
    /**
    * Update user's profile
    *
    * @param  Request $request
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profile.edit');
    }
    
    public function upload(Request $request)
    {
        // Snippet Code for Validation Image Start
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Snippet Code End

        if ($avatar = $request->file('avatar')) {
            $destinationPath = 'images/avatar/';
            $profileImage = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            $avatar->move($destinationPath, $profileImage);
            $input['avatar'] = $profileImage;
            auth()->user()->update($input);
        }
    
        return redirect()->back()->with('success', 'Upload photo profile berhasil ditambahkan!');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profile.edit');
    }
}

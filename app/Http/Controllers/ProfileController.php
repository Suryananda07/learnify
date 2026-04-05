<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $profile)
    {
        return view('edit-profile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => ['required', 'max:50', Rule::unique('users')->ignore($profile->id)],
            'image' => 'nullable|image|max:10240'
            ],[
                'name.required' => 'nama harus diisi',
            ]);
                if($request->hasFile('image')){
                if($profile->image){
                    Storage::disk('public')->delete($profile->image);
                }
                $validated['image'] = $request->file('image')->store('user_image', 'public');
            }
        $profile->update($validated);

        return redirect(route('home', compact('profile')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

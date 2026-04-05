<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class InfoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->role;
        $view = $request->view;
        $search = $request->search;

        $query = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                    $q->orWhere('email', 'like', "%{$search}%");
                    $q->orWhere('role', 'like', "%{$search}%");
                });
            })
            ->when($role && $role !== 'allUser', function ($query) use ($role) {
                $query->where('role', $role);
            });
            $allUsers = $view === 'all' 
            ? $query->get()
            : $query->take(5)->get();

        return view('admin.user-info.index', compact('allUsers'));
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
    public function edit(User $user)
    {
        $roles = User::latest()->get();
        return view('admin.user-info.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => ['required', 'max:50', Rule::unique('users')->ignore($user->id),],
            'image' => 'nullable|image|max:10240',
            'role' => 'required|in:admin,user'
        ],[
            'name.required' => 'nama harus diisi',
            'role.required' => 'role harus dipilih',
            'role.in' => 'role tidak valid',
        ]);
        if($request->hasFile('image')){
            if($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $validated['image'] = $request->file('image')->store('user_image', 'public');
        }

        $user->update($validated);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->image){
            Storage::disk('public')->delete($user->image);
        }

        if($user->courses()->exists()){
            return back()->with('error', 'Admin masih memiliki course');
        }

        $user->delete();

        return redirect(route('users.index'));
    }
}

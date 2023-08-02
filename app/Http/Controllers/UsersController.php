<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = Users::all();
        return view('users.index', compact('users'));
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
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        //
    }

    public function follow(Users $user)
    {
        if (!$this->auth()->user()->isFollowing($user->id)) {
            $this->auth()->user()->following()->attach($user->id);
        }

        return back();
    }

    public function unfollow(Users $user)
    {
        if ($this->auth()->user()->isFollowing($user->id)) {
            $this->auth()->user()->following()->detach($user->id);
        }

        return back();
    }
}

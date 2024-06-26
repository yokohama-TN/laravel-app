<?php

namespace App\Http\Controllers;

use App\Models\Follows;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $user = Auth::user();
        $user_id = $user->id;
        $followed_ids = Follows::where('follower_id', $user_id)->pluck('followed_id')->toArray();
        return view('follower.index', compact('followed_ids'));
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
    public function show(Follows $follows)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follows $follows)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follows $follows)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follows $follows)
    {
        //
    }
}

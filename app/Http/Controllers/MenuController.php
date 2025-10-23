<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //todo เก็บ session ของ profile หรือ ถ้ามีแค่คนเดียว ให้เลือก default ได้เลย
        return view('menu.index');
    }

    public function profile(String $id)
    {
        //

//        dd($id);


        $profile = Profile::find($id);
        session(['pid' => $id]);
        session(['profile' => $profile]);
//        dd($profile);

        //todo เก็บ session ของ profile หรือ ถ้ามีแค่คนเดียว ให้เลือก default ได้เลย
        return view('menu.index' , compact('id','profile'));
    }

    public function addmenu()
    {
        //


        //todo เก็บ session ของ profile หรือ ถ้ามีแค่คนเดียว ให้เลือก default ได้เลย
        return view('menu.add' );
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

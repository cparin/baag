<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $auth = session('auth');
//        if($auth){
//
//        }
//        dd($auth);
        $profiles = Profile::where('user_id',$auth['id'])->get();
        session(['profiles' => $profiles]);
//        dd($profiles);

        return view('profile.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
        ]);

        Profile::create([
            'name'=>$request->input('name'),
            'user_id'=>$request->input('user_id'),
            'gender'=>$request->input('gender'),
            'birthdate'=>$request->input('birthdate'),
            'father_height'=>$request->input('father_height'),
            'mother_height'=>$request->input('mother_height'),
            'birthweek'=>$request->input('birthweek'),
            'birth_weight'=>$request->input('birth_weight'),
            'birth_height'=>$request->input('birth_height'),

        ]);

        return redirect('/profile')->with('success', 'เพิ่มบุตร/หลานของท่าน เรียบร้อยแล้ว');
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

    public function setting()
    {
        //
        return view('user.setting');
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

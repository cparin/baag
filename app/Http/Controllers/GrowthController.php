<?php

namespace App\Http\Controllers;

use App\Models\Growth;
use Illuminate\Http\Request;

class GrowthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $auth = session('auth');
        $pid = session('pid');
//        dd($pid);

        $growths = Growth::where('profile_id', $pid)->get();
        return view('growth.index', compact('growths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('growth.create');
    }

    public function add(string $aid)
    {


        return view('growth.create', compact('aid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
//        dd($request);

        Growth::create($request->all());
        return redirect()->route('growth.index')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');

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

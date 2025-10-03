<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.login');
    }

    public function forgot()
    {
        return view('forgot');
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


        $username = $request->get('email');
        $password = $request->get('password');

        //สำหรับทดสอบระบบเท่านั้น
        //todo ตรวจสอบ user , password

        $auth = User::where('email', $username)->first();


        if ($auth && Hash::check($password, $auth->password)) {

            session(['auth' => $auth]);

            $auth = session('auth');

                return redirect('/');

        }else {
            $request->session()->flash('message', 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง!');
            return Redirect::back();
        }


//        dd($auth);

//        return redirect('/');

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
    public function logout(Request $request)
    {
        $request->session()->forget('auth');
        $request->session()->forget('pid');


        return redirect('/');
    }

}

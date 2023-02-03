<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GantiPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.ganti_password.index', ['title' => 'Ganti Password', 'admin' => $admin]);
        }
        if(Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.ganti_password.index', ['title' => 'Ganti Password', 'user' => $user]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'password_old' => 'required',
            'password_new' => 'required',
            'password_confirm' => 'required',
        ], [
            'password_old.required' => 'Password lama harus diisi',
            'password_new.required' => 'Password baru harus diisi',
            'password_confirm.required' => 'Konfirmasi password harus diisi',
        ]);

        $user = User::where('username', Auth::user()->username)->first();

        if(Hash::check($request->password_old, $user->password)){
            if($request->password_new == $request->password_confirm){
                $user->update([
                    'password' => Hash::make($request->password_new)
                ]);
                return redirect()->back()->with('success', 'Password berhasil diganti');
            }else{
                return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak sama');
            }
        }
        else{
            return redirect()->back()->with('error', 'Password lama salah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

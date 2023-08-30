<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }

    public function siteUpdate(Request $request)
    {
        $request->validate([
            'phone_f' => 'required|string',
            'phone_s' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);
        $data = $request->only('phone_f', 'phone_s', 'email', 'address');
        $update = SiteInfo::where('id', 1)->update($data);
        if($update) {
            return back()->with('msg', 'Data updated successfully');
        }else {
            return back()->with('msg', 'Some error occur');
        }
    }
}

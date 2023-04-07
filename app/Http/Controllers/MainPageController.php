<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
     public function admin(){
        return view('pages.admin.dashboard');
    }

    public function index()
    {
        $main = Main::first();
        return view('pages.admin.main', compact('main'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string'
        ]);

        $main = Main::first();

        $main->site_title = $request->site_title;
        $main->fav_icon = $request->fav_icon;
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if ($request->file('logo')) {
            $img_file = $request->file('logo');
            $img_file->storeAs('public/img/', 'logo.' . $img_file->getClientOriginalExtension());
            $main->logo = 'storage/img/logo.' . $img_file->getClientOriginalExtension();
        }

        if ($request->file('bc_img')) {
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/', 'bc_img.' . $img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.' . $img_file->getClientOriginalExtension();
        }

        if ($request->file('resume')) {
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/img/', 'resume.' . $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/img/resume.' . $pdf_file->getClientOriginalExtension();
        }
        $main->save();

        return redirect()->route('admin.main')->with('success', " Mainpage data is updated");
    }
}

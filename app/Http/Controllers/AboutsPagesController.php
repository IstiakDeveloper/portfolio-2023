<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutsPagesController extends Controller
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
    public function list()
    {
        $abouts = About::all();

        return view('pages.admin.abouts.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',
            'img' => 'required|image',
        ]);

        $abouts = new About();

        $abouts->title = $request->title;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;
        $img_file = request()->file('img');
        Storage::putFile('public/img/', $img_file);
        $abouts->img = "storage/img/".$img_file->hashName();

        $abouts->save();

        return redirect()->route('admin.abouts.list')->with('success', "This about is created successfully");
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
        $about = About::find($id);
        return view('pages.admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',
            'img' => 'required|image',
        ]);

        $about = About::find($id);

        $about->title = $request->title;
        $about->title2 = $request->title2;
        $about->description = $request->description;

        $img_file = request()->file('img');
        Storage::putFile('public/img/', $img_file);
        $about->img = "storage/img/".$img_file->hashName();

        $about->save();

        return redirect()->route('admin.abouts.list')->with('success', "This about is edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $about = About::find($id);
        $about->delete();
        return redirect()->route('admin.abouts.list')->with('success', "This about is deleted successfully");
    }
}

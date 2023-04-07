<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class portfoliosPagesController extends Controller
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
        $portfolios = Portfolio::all();


        return view('pages.admin.portfolios.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();

        return view('pages.admin.portfolios.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required|string',
            'big_img' => 'required|image',
            'small_img' => 'required|image',
            'client' => 'required|string',
            'category' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $portfolios = new Portfolio();

        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;
        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;
        $portfolios->category_id = $request->category_id;

        $big_file = request()->file('big_img');
        Storage::putFile('public/img/', $big_file);
        $portfolios->big_img = "storage/img/".$big_file->hashName();

        $small_file = request()->file('small_img');
        Storage::putFile('public/img/', $small_file);
        $portfolios->small_img = "storage/img/".$small_file->hashName();

        $portfolios->save();

        return redirect()->route('admin.portfolios.create')->with('success', "This portfolio is created successfully");
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
        $portfolio = Portfolio::find($id);
        return view('pages.admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required|string',

            'client' => 'required|string',
            'category' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $portfolio = Portfolio::find($id);

        // $portfolio->icon = $request->icon;
        // $portfolio->title = $request->title;
        // $portfolio->description = $request->description;
        // $portfolio->save();

        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->category = $request->category;
        $portfolio->category_id = $request->category_id;

        $big_file = request()->file('big_img');
        Storage::putFile('public/img/', $big_file);
        $portfolio->big_img = "storage/img/".$big_file->hashName();

        $small_file = request()->file('small_img');
        Storage::putFile('public/img/', $small_file);
        $portfolio->small_img = "storage/img/".$small_file->hashName();

        $portfolio->save();

        return redirect()->route('admin.portfolios.list')->with('success', "This portfolio is edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return redirect()->route('admin.portfolios.list')->with('success', "This portfolio is deleted successfully");
    }
}

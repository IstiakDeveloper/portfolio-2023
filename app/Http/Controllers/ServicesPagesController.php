<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServicesPagesController extends Controller
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
        $services = Service::all();

        return view('pages.admin.services.list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $main = new Service();

        $main->icon = $request->icon;
        $main->title = $request->title;
        $main->description = $request->description;
        $main->save();

        return redirect()->route('admin.services.create')->with('success', "This service is created successfully");
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
        $service = Service::find($id);
        return view('pages.admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $main = Service::find($id);

        $main->icon = $request->icon;
        $main->title = $request->title;
        $main->description = $request->description;
        $main->save();

        return redirect()->route('admin.services.list')->with('success', "This service is edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $service = Service::find($id);
        $service->delete();
        return redirect()->route('admin.services.list')->with('success', "This service is deleted successfully");
    }
}

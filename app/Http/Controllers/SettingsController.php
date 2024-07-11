<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Settings.index')->with('settings' , Setting::first());
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
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $Setting)
    {
        $this->validate(request() , [
            'blog_name'   => 'required',
            'blog_phone'  => 'required',
            'blog_email'  => 'required',
            'address'     => 'required',
            'description' => 'required'
        ]);

        $setting = $Setting::first();

        $setting->blog_name   = $request->blog_name;
        $setting->blog_phone  = $request->blog_phone;
        $setting->blog_email  = $request->blog_email;
        $setting->address     = $request->address;
        $setting->description = $request->description;

        $setting->update();

        return redirect()->back()->with('success' , "Settings updated successflly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

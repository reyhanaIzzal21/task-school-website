<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.sops.index');
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
    public function show(Sop $sop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sop $sop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sop $sop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sop $sop)
    {
        //
    }
}

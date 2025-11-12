<?php

namespace App\Http\Controllers;

use App\Models\TestPost;
use App\Http\Requests\StoreTestPostRequest;
use App\Http\Requests\UpdateTestPostRequest;

class TestPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTestPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TestPost $testPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestPost $testPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestPostRequest $request, TestPost $testPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestPost $testPost)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subjects;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function subject()
    {
        $subject = Subjects::all();
        return view('subject', [
            'title' => 'Subject',
            'subject' => $subject
        ]);
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
    public function show(fs $fs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fs $fs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fs $fs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fs $fs)
    {
        //
    }
}

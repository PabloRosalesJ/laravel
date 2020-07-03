<?php

namespace App\Http\Controllers;

use App\Credits;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = Credits::orderBy('id', 'desc')->paginate(15);
        return view('credit.index', compact('credits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('credit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credits  $credits
     * @return \Illuminate\Http\Response
     */
    public function show(Credits $credits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credits  $credits
     * @return \Illuminate\Http\Response
     */
    public function edit(Credits $credits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credits  $credits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credits $credits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credits  $credits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credits $credits)
    {
        //
    }

    
}

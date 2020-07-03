<?php

namespace App\Http\Controllers;

use App\Person;
use App\Seller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::orderBy('id', 'desc')->paginate(15);
        return view('seller.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $person = Person::create($request->all());

        $seller = new Seller();
        $seller->username = $request->input('username');
        $seller->password = bcrypt($request->input('password'));
        $seller->people_id = $person->id;
        $seller->save();

        return redirect()->back()->with('status', 'Vendedor creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return view('seller.show', compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    // public function edit(Seller $seller)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        // dd($request->all());
        $person = Person::findOrFail($seller->people_id);
        $person->name = $request->input('name');
        $person->ap_pat = $request->input('ap_pat');
        $person->ap_mat = $request->input('ap_mat');
        $person->address = $request->input('address');
        $person->phone = $request->input('phone');
        $person->slug = SlugService::createSlug(Person::class, 'slug', 
                        $request->input('name'), ['unique' => true]);
        $person->save();
        //return $person;
        
        $seller->username = request()->input('username');
        $seller->password = request()->input('password');
        $seller->save();
        
        return redirect()->back()->with("status", "Vendedor actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Person;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::orderBy('id', 'desc')->paginate(15);
        return view('buyer.index', compact('buyers'));
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
        $person = Person::create($request->all());

        $buyer = new Buyer();
        $buyer->people_id = $person->id;
        $buyer->no_notebook = $request->input('no_notebook');
        $buyer->no_registry = $request->input('no_registry');
        $buyer->save();

        return redirect()->back()->with("status", "Usuario creado correctamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        return view('buyer.show', ["buyer" => $buyer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    // public function edit(Buyer $buyer)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        $person = Person::findOrFail($buyer->people_id);
        $person->name = $request->input('name');
        $person->ap_pat = $request->input('ap_pat');
        $person->ap_mat = $request->input('ap_mat');
        $person->address = $request->input('address');
        $person->phone = $request->input('phone');
        $person->slug = SlugService::createSlug(Person::class, 'slug', 
                        $request->input('name'), ['unique' => true]);
        $person->save();

        $buyer->no_notebook = $request->input('no_notebook');
        $buyer->no_registry = $request->input('no_registry');
        $buyer->save();
        
        return redirect()->back()->with("status", "Cliente actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer, Person $person)
    {   
        $person::find($buyer->person->id)->delete();
        
        $buyer->delete();
        return redirect()->back()->with('status', 'Usuario removido de la base de datos');
    }

    public function all(){
        
        return response()->json(Buyer::all());
    }

    public function getById($id)
    {
        $buyer = Buyer::findOrFail($id);  
        $buyer->person;
                             
        return response()->json($buyer);
    }
    
        //          ->select(
        //             'id',
        //             'name',
        //             'ap_pat',
        //             'ap_mat',
        //             'address',
        //             'phone',
        //             'no_notebook',
        //             'no_registry'
        //             )->get();
}

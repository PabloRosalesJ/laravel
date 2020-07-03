<?php
namespace App\Repositories;

use App\Person;
use Illuminate\Http\Request;

class PersonRepository implements IPerson{

    public function store(Request $request){
        $person = Person::create($request->all());
        return $person;
    }

    public function all(){

    }

    public function update(){

    }

    public function delete(){

    }   

}
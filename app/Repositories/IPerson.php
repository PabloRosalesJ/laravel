<?php
namespace App\Repositories;

interface IPerson{
    public function store();
    public function all();
    public function update();
    public function delete();
}
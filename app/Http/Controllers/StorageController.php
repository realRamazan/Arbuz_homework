<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index(){
        $storages = Storage::all();
        return view('main', compact('storages'));
    }

    public function create(){
        $fruitsArr = [
            [
                'name'=>'banana',
                'quantity'=>40,
                'measurement'=>'kg',
                'type'=>'fruit',
            ],
            [
                'name'=>'cherry',
                'quantity'=>60,
                'measurement'=>'kg',
                'type'=>'fruit'
            ],
        ];

        foreach ($fruitsArr as $item){
            Storage::create($item);
        }
        dd("created");
    }
}

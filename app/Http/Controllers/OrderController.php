<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Storage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $data = request()->validate([
            'quantity'=>'array',
            'id'=>'array',
            'period'=>'integer',
            'day'=>'string',
            'name'=>'array'
        ]);
        $notEnough = [];
        for($x = 0; $x < count($data['quantity']); $x += 1){
            if($data['quantity'][$x] != null){
                $check = Storage::find($data['id'][$x]);
                if($check->quantity - $data['quantity'][$x] < 0){
                    $notEnough[] = $data['name'][$x];
                }
            }
        }
        $quantity = $data['quantity'];
        $name = $data['name'];

        if(empty($notEnough)){
//            dump($data);
            return view('order', compact('data'));
        }
        else{
            return view('notEnough', compact('notEnough'));
        }
    }

    public function create(){
        $data = request()->validate([
            'quantity' => '',
            'name' => '',
            'phone_number' => 'string',
            'address' => 'string',
            'day' => 'string',
            'period' => 'string',
            'id'=>''
        ]);
        $order = "";
        $phone = $data['phone_number'];
        for($x = 0; $x < count($data['quantity']); $x += 1){
            if($data['quantity'][$x] != null){
                $order = $order . $data['name'][$x] . "\n" . $data['quantity'][$x] . "\n" . ", ";
            }
        }

        Order::create([
            'phone_number' => $phone,
            'address' => $data['address'],
            'order' => $order,
            'day' => $data['day'],
            'period' => $data['period'],
        ]);

        for($x = 0; $x < count($data['quantity']); $x += 1){
            if($data['quantity'][$x] != null){
                $product = Storage::find($data['id'][$x]);
                $new_quantity = $product->quantity - $data['quantity'][$x];
                $product->update([
                    'quantity'=>$new_quantity
                ]);
            }
        }

        echo $order . "\n" . $phone;
    }


}

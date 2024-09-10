<?php

use Illuminate\Support\Facades\Route;

const INPUT = [
    ["name" => "Orange", "cost" => 50000000, "amount" => 27],
    ["name" => "Banana", "cost" => 120000000, "amount" => 17],
    ["name" => "Bread", "cost" => 70000000, "amount" => 0],
];

Route::get('/', function () {
    return view('products');
});

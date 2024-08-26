<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //Display all payments
    public function all(){

        $allPayments = Payment::all();
        dd($allPayments);
    }

    //Add a payment
    public function add(){}

    //Save a payment
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete payment
    public function delete(){}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Project;

class PaymentController extends Controller
{
    //Display all payments
    public function all(){

        $allPayments = Payment::all();
        
        return view('payment.all',['payments' => $allPayments]);
    }

    //Add a payment
    public function add(){
        $projects = Project::all();
        return view('payment.add',['projects'=>$projects]);
    }

    //Save a payment
    public function save(Request $request){
        $payment_amount = $request->get('project_amount');
        $payment_projectid = $request->get('Project_id');

        $payment = new Payment();
        $payment->Project_amount =$payment_amount;
        $payment->project_id =$payment_projectid;
        $payment->save();

        return redirect('payments');
    }

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete payment
    public function delete($Payment_id){

        $payment = Payment::find($Payment_id);

        if($payment){
            $payment->delete();
            return redirect('payments')->with('status',"Payment deleted");
        }else{
            return redirect('payments')->with('status',"Payment does not exist");
        }
    }
}

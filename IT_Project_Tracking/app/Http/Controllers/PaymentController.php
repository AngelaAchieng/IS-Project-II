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

        $this->validate($request, [
            'Project_id'=> 'required'
        ]);

        $payment_amount = $request->get('project_amount');
        $payment_date = $request->get('bdate');
        $payment_projectid = $request->get('Project_id');

        $payment = new Payment();
        $payment->Project_amount =$payment_amount;
        $payment->Date =$payment_date;
        $payment->project_id =$payment_projectid;
        $payment->save();

        return redirect('payments')->with('success','Payment successfully added');
    }

    //Make changes
    public function edit($Payment_id){
        $projects = Project::all();
        $payment = Payment::find($Payment_id);

        if($payment){
            return view('payment.edit',['payment' => $payment], ['projects'=>$projects]);
        }else{
            return redirect('payments');
        }
    }

    //Update made
    public function update($Payment_id, Request $request){

        $this->validate($request, [
            'Project_id'=> 'required'
        ]);
        
        $payment_amount = $request->get('project_amount');
        $payment_date = $request->get('bdate');
        $payment_projectid = $request->get('Project_id');
        $payment = Payment::find($Payment_id);

        if($payment){
            $payment->Project_amount =$payment_amount;
            $payment->Date =$payment_date;
            $payment->project_id =$payment_projectid;
            $payment->save();
            return redirect('payments')->with('success','Payment updated');
        }else{
            return redirect('payments');
        }
    }

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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlanInsertFormRequest;
use App\Http\Requests\PlanUpdateFormRequest;
use App\Payment;
use App\PaymentPlan;

class PaymentplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=PaymentPlan::where('status',1)->get();
        return view('backend.paymentplan.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.paymentplan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanInsertFormRequest $request)
    {
        PaymentPlan::create([
            'name'=>$request->get('payment_plan'),            
            'price'=>$request->get('price'),            
            'duration'=>$request->get('duration'), 
            'status'=>1,
        ]);
        return redirect('admin/plan/create')->with('status','new plan has been inserted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan=PaymentPlan::whereId($id)->firstOrFail();
        return view('backend.paymentplan.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanUpdateFormRequest $request, $id)
    {
        $plan=PaymentPlan::whereId($id)->firstOrFail();
        $plan->name=$request->get('payment_plan');
        $plan->price=$request->get('price');
        $plan->status=$request->get('status');
        $plan->update();
        return redirect(action('admin\PaymentplanController@edit',$id))->with('status','successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

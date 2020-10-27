<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstallationInsertFormRequest;
use App\Http\Requests\InstallationUpdateFormRequest;
use App\Installation;
use App\PaymentPlan;
use App\Spliter;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class InstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $installations=Installation::all();
        return view('backend.installation.index',compact('installations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::where('status',1)->get();
        $plans=PaymentPlan::where('status',1)->get();
        $spliters=Spliter::where('status',1)->get();
        return view('backend.installation.create',compact('customers','plans','spliters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstallationInsertFormRequest $request)
    {
        Installation::create([
            'date'=>Carbon::parse($request->get('date')),
            'customer_id'=>$request->get('customer_id'),
            'spliter_id'=>$request->get('spliter_id'),
            'cable_length'=>$request->get('cable_length'),
            'plan_id'=>$request->get('plan_id'),
            'installed_by'=>$request->get('installed_by'),
            'remark'=>$request->get('remark'),
        ]);
        $customer=Customer::find($request->get('customer_id'));
        $customer->status=2;
        $customer->update();
        return redirect('admin/installation/create')->with('status','new installation has been inserted.');
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
        $installation=Installation::whereId($id)->firstOrFail();
        $spliters=Spliter::where('status',1)->get();
        $plans=PaymentPlan::where('status',1)->get();
        $customers=Customer::where('status',2)->get();
        return view('backend.installation.edit',compact('installation','spliters','plans','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstallationUpdateFormRequest $request, $id)
    {
        $installation=Installation::whereId($id)->firstOrFail();
        $installation->date=Carbon::parse($request->get('date'));
        $installation->customer_id=$request->get('customer_id');
        $installation->spliter_id=$request->get('spliter_id');
        $installation->plan_id=$request->get('plan_id');
        $installation->cable_length=$request->get('cable_length');
        $installation->installed_by=$request->get('installed_by');        
        $installation->remark=$request->get('remark');        
        $installation->update();
        return redirect(action('admin\InstallationController@edit',$id))->with('status','successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
       // $installations=Installation::all();
        return view('backend.test');
    }
    public function data(){
        return DataTables::of(Installation::all())
        ->make(true);
    }
}

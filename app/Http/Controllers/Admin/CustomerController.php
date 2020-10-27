<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerInsertFormRequest;
use App\Http\Requests\CustomerUpdateFormRequest;
use App\Installation;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        return view('backend.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerInsertFormRequest $request)
    {
        Customer::create([
            'name'=>$request->get('customer_name'),
            'phone'=>$request->get('phone'),
            'address'=>$request->get('address'),
            'status'=>1,
        ]);
        return redirect('admin/customer/create')->with('status','new customer has been inserted.');
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
        
        $customer=Customer::whereId($id)->firstOrFail();
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateFormRequest $request, $id)
    {
        $customer=Customer::whereId($id)->firstOrFail();
        $customer->name=$request->get('customer_name');
        $customer->phone=$request->get('phone');
        $customer->address=$request->get('address');
        $customer->update();
        return redirect(action('admin\CustomerController@edit',$id))->with('status','successfully edited.');
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
    public function due(){
        $installs=Installation::all();
        return view('backend.customer.due',compact('installs'));
    }

    public function active(){
        $installs=Installation::all();
        return view('backend.customer.active',compact('installs'));
    }


    public function all(){
        $installs=Installation::all();
        return view('backend.customer.all',compact('installs'));
    }
}

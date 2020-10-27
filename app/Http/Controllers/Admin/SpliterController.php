<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpliterInsertFormRequest;
use App\Http\Requests\SpliterUpdateFormRequest;
use App\Spliter;

class SpliterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spliters=Spliter::all();
        return view('backend.spliter.index',compact('spliters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.spliter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpliterInsertFormRequest $request)
    {
        Spliter::create([
            'name'=>$request->get('spliter_name'),
            'code'=>$request->get('code'),
            'installed_by'=>$request->get('installed_by'),
            'status'=>1,
        ]);
        return redirect('admin/spliter/create')->with('status','new spliter has been inserted.');
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
        $spliter=Spliter::whereId($id)->firstOrFail();
        return view('backend.spliter.edit',compact('spliter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpliterUpdateFormRequest $request, $id)
    {
        $spliter=Spliter::whereId($id)->firstOrFail();
        $spliter->name=$request->get('spliter_name');
        $spliter->code=$request->get('code');
        $spliter->installed_by=$request->get('installed_by');
        $spliter->update();
        return redirect(action('admin\SpliterController@edit',$id))->with('status','successfully edited.');
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

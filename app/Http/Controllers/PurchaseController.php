<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Offering;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		return view('purchase.index');					   
        
    }
	public function getlist()
    {
        $allpurchase=Purchase::with(['offering'])->get();
							   
        return response(['status'=>true,'message'=>'Success','data'=>$allpurchase],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
	    
		$offerings = Offering::all();
		
        return view('purchase.create',compact('offerings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $obj_purchase=new Purchase;
		$data = $request->all(); 
		$obj_purchase->customerName=$data['customerName'];
		$obj_purchase->offeringId=$data['offeringId'];
		$obj_purchase->quantity=$data['quantity'];
	  
		if($obj_purchase->save()) {
		
		  return response(['status'=>true,'mesasge'=>"sucecss"],200);
		 } else {
			 
		  return response(['status'=>false,'mesasge'=>"failer"],400); 
		 }
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         return view('purchase.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

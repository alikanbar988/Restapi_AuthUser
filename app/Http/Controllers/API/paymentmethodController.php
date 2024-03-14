<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\paymentmethod;
use App\Http\Requests\paymentmethodRequest;
use App\Http\Controllers\Controller;

class paymentmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request )

    {
        $per_page=$request->get('per_page',25);
        $paymentmethod=paymentmethod::paginate($per_page);
        return response()->json($paymentmethod);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymentmethod = PaymentMethod::create([
            'CARD NUMBER' => $request['CARD NUMBER'],
            'NAME ON CARD'=>$request['NAME ON CARD'],
            'EXPIRY DATE'=>$request['EXPIRY DATE'],
            'CVV'=>$request['CVV']
        ]);
        
        return response()->json(['message'=>"Payment Method has been added successfully", 
        "data"=>$paymentmethod
    ]);  
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paymentmethod=paymentmethod::findOrfial($id);
        return response()->json([
            'status'=>200,
            'data'=>$paymentmethod
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paymentmethod=paymentmethod::findOrFail($id);
        $paymentmethod->update($request->all());
        return response()->json([
        'status'=>201,
        'message'=>$paymentmethod
    ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentmethod = PaymentMethod::findOrfail($id);
        $paymentmethod->delete();

        return response()->json(['message'=>'The payment method has been deleted'],204);
    }
}

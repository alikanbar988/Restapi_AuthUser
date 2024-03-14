<?php

namespace App\Http\Controllers\API;



use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $per_page =$request->get('per_page',25);
        $user=user::paginate($per_page);
        return response()->json($user);
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
        $user=user ::create( $request ->all());
        return response()->json(['message'=>'User Created Successfully',
        'data'=>$user
    ],201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=user::findOrFail($id);
        return response()->json($user,200);
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
        $user = user::findOrFail($id);
        $user->update( $request->all() );
        
        return response()->json([   
            "message"=>"Records Updated",
            "data"=>$user
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=user::findOrFail($id);
        $user->delete();
        return response()->json([
            "message"=>"Record Deleted"],204);

    }
}

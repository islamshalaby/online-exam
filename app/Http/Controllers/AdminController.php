<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Type;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(! $this->amIAdmin() ) { return redirect ('/home');}
        $user = DB::table('users')
            ->join('types', 'users.type_id', '=', 'types.id')
            ->select('users.id', 'users.name', 'users.email', 'users.password', 'types.type_name', )
            ->get();
        //return $user;
        $arr=array('user'=>$user);
        return view ('admin.allUsers', $arr);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if(! $this->amIAdmin() ) { return redirect ('/home');}
        $users = DB::table('users')->get();
        $user=User::all();
        $arr=array('user'=>$user);
        return view ('admin.allUsers', $arr);
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
        if(! $this->amIAdmin() ) { return redirect ('/home');}

        $user = User::findOrFail($id);

        $types = Type::pluck('type_name', 'id')->all();
        
        $userz=DB::table('users')
        ->join('types', 'users.type_id', '=', 'types.id')
        ->where('types.id','=',$id)
        ->get();
        return view ('admin.edit', compact('user' , 'types','userz'));

        return view ('admin.edit');
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
        if(! $this->amIAdmin() ) { return redirect ('/home');}

        $user = User::Find($id);
        $user->type_id=$request['type_id'];
        $user->password=$request['password'];
        $user->save();
        return redirect ('/admin');
        return "ok"; 
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

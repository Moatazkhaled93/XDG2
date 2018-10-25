<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class User extends Controller
{
    public  function  index(){

        $user=users::all();
        return view ('home',compact ('user'));
    }


    public  function  rowid( Request $id){

        $user=DB::table('users')->where('id',$id->id)->first();
        return response()->json($user);
    }



    public function adduser(Request $request){
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails()){
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }
        else {
            $user = new Users;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return response()->json($user);
        }
    }



    public function edituser(request $request){
        $user = users::find ($request->id);
        $user->name = $request->name;
        
        $user->save();
        return response()->json($user);
      }
      

      public function deleteuser(request $request){
        $user = users::find ($request->id)->delete();
        return response()->json();
      }
      
}

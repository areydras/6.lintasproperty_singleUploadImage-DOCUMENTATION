<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }

    public function owner(){
        return User::where('level', '=', 'admin')->first();
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
        $currentPhoto = $user->photo;
        
        
        if($request->photo){
            $name = time(). '.' . explode('/', substr($request->photo, 0, strpos($request->photo, ';')))[1];
            \Image::make($request->photo)->save(public_path('image/profile/'.$name));
            
            $request->merge(['photo' => $name]);
            
            $userPhoto = public_path('image/profile/'.$currentPhoto);
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request->password)]);
        }

        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        //
    }
}

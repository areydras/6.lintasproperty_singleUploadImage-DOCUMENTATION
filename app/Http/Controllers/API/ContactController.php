<?php

namespace App\Http\Controllers\API;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        return Contact::latest()->paginate(15);
    }

    public function validation($request){
        return $this->validate($request, [
            'name' => 'required|min:3|max:191',
            'phone' => 'required|min:1|numeric',
            'email' => 'required|min:1|email',
            'message' => 'required|min:3'
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
        return Contact::create($request->all());
    }

    public function destroy($id)
    {
        $current_data =  Contact::where('id', '=', $id)->first();
        Contact::destroy($id);
        return $current_data;
    }
}

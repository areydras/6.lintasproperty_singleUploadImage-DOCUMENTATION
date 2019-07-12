<?php

namespace App\Http\Controllers\Api;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    public function index(){
        return Property::latest()->paginate(15);
    }

    public function validation($request){
        return $this->validate($request, [
                    'name' => 'required|min:3|max:191',
                    'bedrooms' => 'required|min:1|numeric',
                    'bathrooms' => 'required|min:1|numeric',
                    'city' => 'required|min:3|max:191',
                    'category' => 'required|min:3|max:191',
                    'surface_area' => 'required|min:3|numeric',
                    'price' => 'required|min:3|numeric',
                    'description' => 'required|min:3',
                    'address' => 'required|min:3'
        ]);
    }

    public function details($id){
        return Property::where('id', '=', $id)->first();
    }

    public function store(Request $request){
        if($request->image){
            $name = time() . '.' . explode('/', substr($request->image, 0, strpos($request->image, ';')))[1];        
            \Image::make($request->image)->save(public_path('image/properties/'. $name));
            $request->merge(['image' => $name]);
        }

        $this->validation($request);
        return Property::create($request->all());
    }

    public function update(Request $request, $id){
        $this->validation($request);
        $property = Property::findOrFail($id);
        $property->update($request->all());
        return $property;
    }

    public function destroy($id){
        $current_data =  Property::where('id', '=', $id)->first();
        Property::destroy($id);
        return $current_data;
    }
}

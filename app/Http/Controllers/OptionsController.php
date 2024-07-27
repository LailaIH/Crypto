<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index(){
   
   $options = Option::all();
   return view('options.index',compact('options'));

  }

  public function create(){

   return view('options.create');
  }

  private function validatedData(Request $request){
       $data = $request->validate([
           'key'=>'required',
           'value'=>'required',
           
       ]);

      

      
       return $data;

}

  public function store(Request $request){

       $data = $this->validatedData($request);

       $additional = ['user_id'=>auth()->user()->id];

       $finalData = array_merge($data,$additional);

       Option::create($finalData);

       return redirect()->route('options.index')->with('success','option was created successfully');

       
  }

  public function edit($id){

       $option = Option::findOrFail($id);
       return view('options.edit',compact('option'));
  }


  public function update(Request $request , $id){
    $option = Option::findOrFail($id);


       $data = $this->validatedData($request);

      

       $option->update($data);
       return redirect()->route('options.index')->with('success','option was updated successfully');



  }

  public function destroy($id){

        Option::destroy($id);
        return redirect()->route('options.index')->withErrors(['fail'=>'option was deleted']);

  }
}

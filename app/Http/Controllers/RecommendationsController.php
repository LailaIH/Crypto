<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index(){
   
   $recommendations = Recommendation::all();
   return view('recommendations.index',compact('recommendations'));

  }

  public function create(){

   return view('recommendations.create');
  }

  private function validatedData(Request $request){
       $data = $request->validate([
           'entry'=>'required',
           'targets'=>'required',
           
       ]);


       return $data;

}

  public function store(Request $request){

       $data = $this->validatedData($request);

       $additional = ['user_id'=>auth()->user()->id];

       $finalData = array_merge($data,$additional);

       Recommendation::create($finalData);

       return redirect()->route('recommendations.index')->with('success','recommendation was created successfully');

       
  }

  public function edit($uuid){

       $recommendation = Recommendation::where('uuid',$uuid)->first();
       return view('recommendations.edit',compact('recommendation'));
  }


  public function update(Request $request , $uuid){
       $recommendation = Recommendation::where('uuid',$uuid)->first();

       $additional = ['is_online'=> $request->has('is_online')?1:0 , 'stop_loss'=>$request->input('stop_loss')];

       $data = $this->validatedData($request);

       $finalData = array_merge($data,$additional);

       $recommendation->update($finalData);
       return redirect()->route('recommendations.index')->with('success','recommendation was updated successfully');



  }
}

@extends('common')
@section('content')

  <div class="container mt-n5">

     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif 



                                <!-- Account details card-->
                                <div class="card">
                                    <div class="card-header">Option Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                        <form action="{{ route('options.update',$option->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                  <label for="key" class="form-label"> Key </label>

                                                  <input class="form-control" name="key"  type="text" value="{{$option->key}}" required/>
                                                  
                                                </div>

                                                <div class="col-md-6">
                                                <label for="value" class="form-label"> Value </label>

                                                   
                                                   <input class="form-control" name="value"  type="text" value="{{$option->value}}" required/>
                                                 
                                               </div>
                                                
                                                
                                            </div>
                                           
                                            <div class="row gx-3 mb-3">
                                            <div class="col-12">
                                            <button class="btn btn-primary btn-sm" type="submit">Save Changes</button></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       




@endsection                       
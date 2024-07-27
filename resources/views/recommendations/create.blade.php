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
                                    <div class="card-header">Recommendation Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                        <form action="{{ route('recommendations.store') }}" method="POST">
                                        @csrf
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                  <label for="entry" class="form-label"> Entry </label>

                                                   
                                                    <select name="entry" id="entry" class="form-control form-control-solid" aria-label="Default select example" required>
                                                        <option value="" disabled selected>Select an entry</option>
                                                        
                                                            <option value="entry 1">entry 1</option>
                                                            <option value="entry 2">entry 2</option>
                                                            <option value="entry 3">entry 3</option>
                                                            <option value="entry 4">entry 4</option>
                                                        
                                                    </select>                                                  
                                                </div>

                                                <div class="col-md-6">
                                                <label for="targets" class="form-label"> Target </label>

                                                   
                                                   <input class="form-control" name="targets"  type="text" value="{{old('targets')}}" required/>
                                                 
                                               </div>
                                                
                                                
                                            </div>
                                           
                                            <div class="row gx-3 mb-3">
                                            <div class="col-12">
                                            <button class="btn btn-primary btn-sm" type="submit">Submit</button></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       



<script>
    function updateProfileImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('product-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit form after selecting image
    }
</script>
@endsection                       
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
                                    <div class="card-header">User Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                        <form action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                  <label for="email" class="form-label"> Email </label>

                                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror                                                 
                                                </div>

                                                <div class="col-md-6">
                                                <label for="name" class="form-label"> Name </label>

                                                   
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror                                                 
                                               </div>
                                                
                                                
                                            </div>


                          <div class="row gx-3 mb-3">
                             <div class="col-md-6">
                                    <label for="password" class="form-label ">{{ __('Password') }}</label>

                                   
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                               

                        <div class="col-md-6">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
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
@extends('common')
@section('content')


        <!-- Main page content-->
        <div class="container mt-n5">

           


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">List Of Users That Want To Subscribe</div>
                    <div class="card-body">

                        @if ($users->isEmpty())
                            <p>No Users Want To Subscribe.</p>
                        @else
                            <div class=" mt-3 table-container">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                        <th>User</th>
                                        <th>Email</th>
                             
                                       
                                        <th></th>
                                        <th></th>
                                        



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td style="color: black;"><b>{{$user->name}}</b></td>
                                            <td>{{$user->email}}</td>

                                            <td>
                                               <form method="post" action="{{route('registerFreeDays',$user->uuid)}}">
                                                @csrf 
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-xs">Subscribe Free Days</button>
                                               </form>
                                            </td>

                                            <td>
                                              <form method="post" action="{{route('registerUser',$user->uuid)}}">
                                                @csrf 
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary btn-xs">Subscribe</button>
                                               </form>
                                            </td>
                                            

                         

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>



                            </div>
                        @endif
                            
                     
                    </div>
                </div>


<script>
    let table = new DataTable('#myTable');
</script>

@endsection
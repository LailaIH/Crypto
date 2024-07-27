@extends('common')
@section('content')


        <!-- Main page content-->
        <div class="container mt-n5">

           


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">List Of Recommendations</div>
                    <div class="card-body">

                        @if ($recommendations->isEmpty())
                            <p>No Recommendations.</p>
                        @else
                            <div class=" mt-3 table-container">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                        <th>Added By User</th>
                                        <th>Entry</th>
                                        <th>Target</th>
                                        <th>Stop Loss</th>

                                        <th>Is Online</th>
                                       
                                        <th>Actions</th>
                                        



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($recommendations as $recommendation)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td style="color: black;"><b>{{$recommendation->user->name}}</b></td>
                                            <td>{{$recommendation->entry}}</td>

                                            <td>
                                                {{$recommendation->targets}}
                                            </td>

                                            <td>
                                                    {{$recommendation->stop_loss}}
                                            </td>
                                            

                                            <td>
                                                <span class="badge {{ $recommendation->is_online ? 'badge-green' : 'badge-red' }}">
                                                    {{ $recommendation->is_online ? 'Online' : 'Offline' }}
                                                    </span>
                 
                                            </td>
        
                                          
                                            
                                            <td>
                                                <a href="{{route('recommendations.edit',$recommendation->uuid)}}" class="btn btn-primary btn-xs">Edit</a>

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
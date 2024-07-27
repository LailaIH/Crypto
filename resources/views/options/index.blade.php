@extends('common')
@section('content')


        <!-- Main page content-->
        <div class="container mt-n5">

           


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">List Of Options</div>
                    <div class="card-body">

                        @if ($options->isEmpty())
                            <p>No Options.</p>
                        @else
                            <div class=" mt-3 table-container">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
                            
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                        <th>Added By User</th>
                                        <th>Key</th>
                                        <th>Value</th>
                                        
                                       
                                        <th></th>
                                        <th></th>
                                        



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($options as $option)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td style="color: black;"><b>{{$option->user->name}}</b></td>
                                            <td>{{$option->key}}</td>
                                            <td>{{$option->value}}</td>

                           
        
                                          
                                            
                                            <td>
                                                <a href="{{route('options.edit',$option->id)}}" class="btn btn-primary btn-xs">Edit</a>

                                            </td>
                                            <td>
                                                <form method="post" action="{{route('options.destroy',$option->id)}}" onsubmit="return confirmDeletion()">
                                                    @csrf 
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
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

<script>
function confirmDeletion() {
    return confirm('Are you sure you want to delete this item?');
}
</script>

@endsection
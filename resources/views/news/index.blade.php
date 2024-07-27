@extends('common')
@section('content')


        <!-- Main page content-->
        <div class="container mt-n5">

           


                    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

                    <div class="card">
                    <div class="card-header">List Of News</div>
                    <div class="card-body">

                        @if ($news->isEmpty())
                            <p>No News.</p>
                        @else
                            <div class=" mt-3 table-container">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                        <th>Added By User</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Picture</th>

                                        <th>Is Online</th>
                                       
                                        <th>Actions</th>
                                        



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($news as $new)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                            <td style="color: black;"><b>{{$new->user->name}}</b></td>
                                            <td>{{$new->title}}</td>

                                            <td>
                                              @if($new->description)  
                                                @php
                                                $value = $new->description;
                                                $first5Words = mb_strimwidth($value, 0, 50, '...');
                                                @endphp

                                                {{ $first5Words }}
                                               @else 
                                               No Description 
                                               @endif 
                                            </td>

                                            <td>
                                                    @if(isset($new->img))
                                                    <img src="{{ asset('newsImages/'.$new->img) }}" alt=" Picture" width="100" height="100">
                                                    @else
                                                    <img src="{{ asset('assets/img/noimg.jpg') }}" alt="Product Picture" width="100" height="100">
                                                    @endif 
                                            </td>
                                            

                                            <td>
                                                <span class="badge {{ $new->is_online ? 'badge-green' : 'badge-red' }}">
                                                    {{ $new->is_online ? 'Online' : 'Offline' }}
                                                    </span>
                 
                                            </td>
        
                                          
                                            
                                            <td>
                                                <a href="{{route('news.edit',$new->uuid)}}" class="btn btn-primary btn-xs">Edit</a>

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
@extends('layout')
@section('title')
Product Info
@endsection
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="page-content-wrapper ">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h2></h2>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Main Image</th>
                                            <th>images</th>
                                            <th>Delete</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\aktuellt::all() as $key=> $service)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->description}}</td>
                                            <td><img src="{{url('/aktuellt/'.$service->main_image)}}" loading="lazy" width="50" height="50" />
                                                <style>
                                                    img {
                                                        border: ;
                                                    }
                                                </style>
                                            </td>
                                            <td>
                                                @isset($service->images)
                                                    @php
                                                       $varaimage = explode('|',$service->images);
                                                    @endphp
                                                    @foreach ($varaimage as $image )
                                                        <img src="{{url('/aktuellt/'.$image)}}" loading="lazy" width="50" height="50" />
                                                    @endforeach
                                                @endisset

                                            </td>
                                            <td>
                                                <form action="{{route('admin_aktuellt.destroy',$service->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-primary btn-xs"><i
                                                                class="fa fa-trash"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
@endsection

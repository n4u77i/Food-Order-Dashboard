@extends('layout')
@section('title')
Order info
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
                                            <th>Product ID</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>images</th>
                                    
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Orders::all() as $key=> $service)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$service->product_id}}</td>
                                            <td>{{$service->price}}</td>
                                            <td>{{$service->quantity}}</td>
                                           

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

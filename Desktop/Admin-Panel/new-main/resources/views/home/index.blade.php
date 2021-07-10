@extends('layout')
@section('title')
Add Category
@endsection
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-200">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Enter Category Information </h4>
                        <p class="text-muted m-b-30 font-14"></p>
                        <form class="" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Category Name:</strong>(required)</label>
                                        <div>
                                            <input type="text" name="name" class="form-control" required
                                                placeholder="Enter a name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Image:</strong>(required)</label>
                                        <div>
                                            <input type="file" name="image" class="form-control" required
                                                placeholder="Enter image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">All Category Data </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                        
                                            <th>Delete</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\category::all() as $key=> $home)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$home->name}}</td>
                                            <td><img src="{{url($home->image)}}" width="50" height="50" />
                                                <style>
                                                    img {
                                                        border: ;
                                                    }
                                                </style>
                                            </td>
                                           
                                            <td>
                                                <form action="{{route('category.destroy',$home->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <center><button class="btn btn-primary btn-xs"><i
                                                                class="fa fa-trash"></i></button></center>
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


@extends('layout')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Enter Product Information </h4>
                            <p class="text-muted m-b-30 font-14"></p>
                            <form class="" action="{{ route('admin_aktuellt.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong>Category Name:</strong>(required)</label>
                                            <div>
                                                <select name="category_id" class="form-control " id="">
                                                    <option selected disabled>--select--</option>
                                                    @foreach (App\Models\Home::all() as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong>Product Name:</strong>(required)</label>
                                            <div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter a title" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong> Product Main Image:</strong>(required)</label>
                                            <div>
                                                <input type="file" name="main_image" class="form-control"
                                                    placeholder="Enter a image" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong>Product OR Images:</strong>(Multiple Allowed)</label>
                                            <div>
                                                <input type="file" multiple name="images[]" class="form-control"
                                                    placeholder="Select Multiple image" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><strong>Description:</strong>(required)</label>
                                            <div>
                                                <textarea name="description" id="description" class="form-control"
                                                    cols="200" rows="10"></textarea>
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
        </div>
    </div>
@endsection

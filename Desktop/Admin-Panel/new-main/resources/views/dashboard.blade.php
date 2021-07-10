@extends('layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <a href="">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="fa fa-suitcase"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{App\Orders::count()}}</span> 
                        Orders
                    </div>
                </div>
            </a>
        </div>        
        <div class="col-md-6 col-lg-6 col-xl-6">
            <a href="{{url('getPage')}}">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="fa fa-suitcase"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{App\product::count()}}</span> 
                        Total Products
                    </div>
                </div>
            </a>
        </div>        
        <div class="col-md-6 col-lg-6 col-xl-6">
            <a href="{{route('home.index')}}">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="fa fa-suitcase"></i></span>
                    <div class="mini-stat-info text-right text-white">
                         <span class="counter">{{App\category::count()}}</span>
                        Total Categories                    
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

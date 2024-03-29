@extends('layouts.app')
@section('title', 'JUSTDOIT! | Detail')

@section('content')
    <main>
        <section class="content">
            <div class="container mt-5">
                <div class="btn-group text-center">
                    <h2>Detail</h2>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/')}}">View All Shoes</a>
                        <a class="dropdown-item" href="{{url('cart')}}">View Cart</a>
                        <a class="dropdown-item" href="{{url('transaction')}}">View Transaction</a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <img src="{{asset('storage/'.$shoesDetail->image)}}" alt="" style="width: 500px; height: 300px">
                    </div>
                    <div class="col my-1">
                        <h2>{{$shoesDetail->name}}</h2>
                        <p><b>Rp. {{number_format($shoesDetail->price)}}</b></p>
                        <p>{{$shoesDetail->description}}</p>
                        @if($auth && $role == 'USER')
                            <a href="{{ route('cartAdd', $shoesDetail->id)}}"><button class="btn btn-primary">Add to Cart</button></a>
                        @elseif($auth && $role == 'ADMIN')
                            <a href="{{ route('updateShoes', $shoesDetail->id)}}"><button class="btn btn-primary">Update Shoes</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

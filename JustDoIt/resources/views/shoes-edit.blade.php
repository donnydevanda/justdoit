@extends('layouts.app')
@section('title', 'JUSTDOIT! | Edit Shoes')

@section('content')
    <main>
        <section class="content">
            <div class="container mt-5">
                <div class="btn-group text-center">
                    <h2>Shoes Edit</h2>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/')}}">View All Shoes</a>
                        <a class="dropdown-item" href="#">View Cart</a>
                        <a class="dropdown-item" href="#">View Transaction</a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <img src="https://stockx-360.imgix.net//adidas-Yeezy-Boost-350-V2-Zyon/Images/adidas-Yeezy-Boost-350-V2-Zyon/Lv2/img01.jpg?auto=format,compress&w=559&q=90&dpr=2&updated_at=1603481985" alt="" style="width: 500px">
                    </div>
                    <div class="col my-1">
                        <h2>Yeezyeezy eezy eezy eezyeezy eezy eezy</h2>
                        <p><b>Rp. 50.000.000</b></p>
                        <p>Sepatu mahal bos Sepatu mahal bos Sepatu mahal bos Sepatu mahal bos Sepatu mahal bos</p>
                    </div>
                </div>

                <form action="{{url('update')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="id">Name</label>
                        <input type="text" class="form-control" name="id"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" class="form-control-file" name="image">
                    </div>
                    <input type="submit" value="Add Now" class="btn btn-primary mt-3">
                </form>
            </div>
        </section>
    </main>
@endsection

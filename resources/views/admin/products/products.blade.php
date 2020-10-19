@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product )
                        <div class="col-md-6">
                            <div class="alert alert-primary alert">
                                <p>{{$product->title}}</p>
                                <p>Category :{{$product->category->name}}</p>
                                <p>Price :{{$currency_code }}{{$product->price}}</p>
                                {!! (count($product->images) > 0) ? '<img class="img-thumbnail card-img" src="'. $product->images[0]->url.'"/>' : '' !!}

                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {!! !is_null($product) ? 'Update product <span class="product-header-title">' . $product->title . '</span>' : 'New product' !!}
                </div>
                <div class="card-body">
                    <form action="{{route('new-product')}}" method="post">
                        @csrf
                        @if(!is_null($product))
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="prodict_id" value="{{$product->id}}" />

                        <div class="form-group col-md-6">
                            <label for="product_title">Proudct Title</label>
                            <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Product Title" required value="{{(!is_null($product)) ? $product->title : ''}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_description">Product Description</label>
                            <textarea type="text" class="form-control" id="product_description" name="product_description" placeholder="Product_Description" required value="{{(!is_null($product)) ? $product->description : ''}}"
                            cols = "30" rows="10"></textarea>
                        </div>

                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
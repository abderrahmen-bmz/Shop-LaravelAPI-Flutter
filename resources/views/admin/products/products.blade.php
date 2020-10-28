@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products
                    <a class="btn btn-primary" href="{{route('new-product')}}">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product )
                        <div class="col-md-6">
                            <div class="alert alert-primary alert">
                                <p>{{$product->title}}</p>
                                <p>Category :{{(is_object($product->category)) ? $product->category->name : ''}}</p>
                                <p>Price :{{$currency_code }}{{$product->price}}</p>
                                {!! (count($product->images) > 0) ? '<img class="img-thumbnail card-img" src="'. $product->images[0]->url.'" />' : '' !!}
                               
                                @if(! is_null($product->options))
                                <table class="table-bordered table">
                                    @foreach($product->jsonOptions() as $optionKey => $options)
                                            @foreach($options as $option)
                                            <tr>
                                                <td>{{$optionKey}}</td>
                                                <td>{{$option}}</td>
                                            </tr>
                                            @endforeach
                                    @endforeach
                                </table>
                             
                                @endif
                                <a class="btn btn-success" href="{{route('update-product' , ['id' => $product->id])}}">
                                    Update Product
                                </a>
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
@if(Session::has('message'))
<div class="toast" style="position: absolute; top: 20px; right: 20px;">
    <div class="toast-header">
        <strong class="mr-auto">Products</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">*</span>
        </button>
    </div>
    <div class="toast-body">

        {{ Session::get('message')}}

    </div>
</div>
</div>
@endif
@endsection


@section('scripts')



@if(Session::has('message'))
<script>
    $(document).ready(function($) {
        var $toast = $('.toast').toast({
            autohide: false
        });
        $toast.toast('show');
    })
</script>
@endif

@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    <div class="ml-2">
                        <form action="{{route('categories')}}" method="post" class="row">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="category Name" required>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Save New Category</button>
                            </div>

                        </form>
                    </div>
                    <div class="row">
                        @foreach($categories as $category )
                        <div class="col-md-3">
                            <div class="alert alert-primary alert">
                                <span class="buttons-span">
                                    <span><a class="edit-category" data-categoryId="{{$category->id}}" data-categoryName="{{$category->name}}"><i class="fas fa-edit"></i></a></span>
                                    <span><a class="delete-category" data-categoryId="{{$category->id}}" data-categoryName="{{$category->name}}"><i class="fas fa-trash-alt"></i></a></span>
                                </span>
                                <p>{{$category->name}} </p>

                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="row ml-4">
                        {{(!is_null($showLinks) && $showLinks) ? $categories->links() : ''}}
                    </div>


                    <form action="{{route('search-categories')}}" method="post">
                        @csrf
                        <div class="row ml-2">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="category_search" name="category_search" placeholder="Search">
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<span>
    <form action="{{route('categories')}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <input type="hidden" name="category_id" value="{{$category->id}}" />
        <button type="submit" class="delete-btn">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</span>



<div class="modal edit-window" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories')}}" method="POST">
                <div class="modal-body row">
                    <p id="edit-message"></p>
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="category_name">Category name</label>
                        <input type="text" name="category_name" class="form-control" id="edit_category_name" placeholder="Category name" required>

                    </div>

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="category_id" value="" id="edit_category_id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal delete-window" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories')}}" method="post">
                <div class="modal-body">
                    <p id="delete-message"></p>
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="category_id" value="" id="delete_category_id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@if(Session::has('message'))
<div class="toast" style="position: absolute; top: 20px; right: 20px;">
    <div class="toast-header">
        <strong class="mr-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">

        {{ Session::get('message')}}

    </div>
</div>
@endif

@endsection



@section('scripts')
<script>
    $(document).ready(function() {

        var $deleteCategory = $('.delete-category');
        var $deleteWindow = $('.delete-window');
        var $deleteCategoryId = $('#delete_category_id');
        var $deleteMessage = $('#delete-message');
        $deleteCategory.on('click', function(e) {
            e.preventDefault();
            var categoryID = $(this).data('categoryid');
            var categoryName = $(this).data('categoryname');
            $deleteMessage.text('Are you sure you want to delete the category ' + categoryName);
            $deleteCategoryId.val(categoryID);
            $deleteWindow.modal('show');
        })



        $editCategory.on('click', function(e) {
            e.preventDefault();
            var categoryID = $(this).data('categoryid');
            var categoryName = $(this).data('categoryname');
            $edit_category_name.val(categoryName);
            $editCategoryId.val(categoryID);
            $editMessage.text('Are you sure you want to edit the Category ' + categoryName);
            $editWindow.modal('show');
        })


    });
</script>


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
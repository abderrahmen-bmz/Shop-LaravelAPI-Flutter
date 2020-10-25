@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Units</div>

                <div class="card-body">
                    <div class="ml-2">
                        <form action="{{route('units')}}" method="post" class="row">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="unit_name">Unit Name</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Unit Name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="unit_code">Unit Code</label>
                                <input type="text" class="form-control" id="unit_code" name="unit_code" placeholder="Unit Code" required>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Save New Unit</button>
                            </div>

                        </form>
                    </div>
                    <div class="row mr-2 ml-2">
                        @foreach ($units as $unit)
                        <div class="col-md-3">
                            <div class="alert alert-primary" role="alert">
                                <span class="buttons-span">
                                    <span><a class="edit-unit" data-unitId="{{$unit->id}}" data-unitName="{{$unit->unit_name}}" data-unitCode="{{$unit->unit_code}}"><i class="fas fa-edit"></i></a></span>
                                    <span><a class="delete-unit" data-unitId="{{$unit->id}}" data-unitName="{{$unit->unit_name}}" data-unitCode="{{$unit->unit_code}}"><i class="fas fa-trash-alt"></i></a></span>
                                </span>
                                <p>{{$unit->unit_name}} , {{$unit->unit_code}}</p>
                                <p></p>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="row ml-4">
                        {{(!is_null($showLinks) && $showLinks) ? $units->links() : ''}}
                    </div>

                    <form action="{{route('search-units')}}" method="post">
                        @csrf
                        <div class="row ml-2">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="unit_search" name="unit_search" placeholder="Search">
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
    <form action="{{route('units')}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <input type="hidden" name="unit_id" value="{{$unit->id}}" />
        <button type="submit" class="delete-btn">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</span>



<div class="modal edit-window" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('units')}}" method="POST">
                <div class="modal-body row">
                    <p id="edit-message"></p>
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="unit_name">Unit name</label>
                        <input type="text" name="unit_name" class="form-control" id="edit_unit_name" placeholder="Unit name" required>

                    </div>


                    <div class="form-group col-md-6">
                        <label for="unit_code">Unit code</label>
                        <input type="text" name="unit_code" class="form-control" id="edit_unit_code" placeholder="Unit code" required>

                    </div>

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="unit_id" value="" id="edit_unit_id">

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
            <form action="{{route('units')}}" method="post">
                <div class="modal-body">
                    <p id="delete-message"></p>
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="unit_id" value="" id="delete_unit_id">

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
</div>


@endsection


@section('scripts')
<script>
    $(document).ready(function() {

        var $deleteUnit = $('.delete-unit');
        var $deleteWindow = $('.delete-window');
        var $deleteUnitId = $('#delete_unit_id');
        var $deleteMessage = $('#delete-message');
        $deleteUnit.on('click', function(e) {
            e.preventDefault();
            var unitID = $(this).data('unitid');
            var unitName = $(this).data('unitname');
            var unitCode = $(this).data('unitcode');

            $deleteMessage.text('Are you sure you want to delete the unit ' + unitName + ' ' + unitCode);
            $deleteUnitId.val(unitID);
            $deleteWindow.modal('show');
        })

        var $editUnit = $('.edit-unit');
        var $editWindow = $('.edit-window');
        var $editUnitId = $('#edit_unit_id');
        var $editMessage = $('#edit-message');
        var $edit_unit_name = $('#edit_unit_name');
        var $edit_unit_code = $('#edit_unit_code');

        $editUnit.on('click', function(e) {
            e.preventDefault();
            var unitID = $(this).data('unitid');
            var unitName = $(this).data('unitname');
            var unitCode = $(this).data('unitcode');

            $edit_unit_name.val(unitName);
            $edit_unit_code.val(unitCode);
            $editUnitId.val(unitID);

            $editMessage.text('Are you sure you want to edit the unit ' + unitName + ' ' + unitCode);
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
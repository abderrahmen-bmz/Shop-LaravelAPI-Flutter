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
                                <label for="unit_name">Unit Nmae</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name"  placeholder="Unit Name" required>
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
                    <div class="row">
                        @foreach($units as $unit )
                        <div class="col-md-3">
                            <div class="alert alert-primary alert">
                                <p>{{$unit->unit_name}} , {{$unit->unit_code}}</p>

                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{$units->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
  <div class="toast" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header">
      <img src="..." class="rounded mr-2" alt="...">
      <strong class="mr-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
@endsection
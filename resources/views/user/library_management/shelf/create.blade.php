@extends('user.layouts.master-layout')
@section('head')
@section('title','- Create Shelf')


@endsection
@section('main_content')

    
    <div class="right_section">
        <div>
            <h4 style="color: black">Add New Shelf</h4>
        </div>
    </div>
    <div class="passwodBox mb-3 col-md-12" style="background-color: var(  --seller_frontend_color); color:white">
        <form action="{{ route('teacher.library_shelf.store', auth()->user()->id) }}" method="POST" style="margin-top: 0%">
            @csrf
               
            <div class="row">

                <div class="col-sm-6 mt-3">
                    <label class="form-control-label">Shelf Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" style="width: 100%" class="form-control" placeholder="Enter Direction Name" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <label class="form-control-label">Direction Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <select name="direction_id" class="form-control">
                        <option value=""> Select Direction</option>
                        @foreach ($directions as $direction)
                        <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

            </div>

            <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <button type="submit" class="btn btn-info ">Save</button>
                </div>
              </div>

        </form>
    </div>
@endsection



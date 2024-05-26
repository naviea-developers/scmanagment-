@section('title')
    Admin - Edit Shelf
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.shelf.index')}}"> <i class="icon ion-reply text-22"></i> All Shelves</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Shelf Info</h6>
             {{-- validate start  --}}
             @if(count($errors) > 0)
             @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{ $error }}</div>
             @endforeach
             @endif
             {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-7 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.shelf.update', $shelf->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                              <div class="col-sm-12">
                                  <label class="form-control-label">Direction Name: <span class="tx-danger">*</span></label>
                                  <div class="mg-t-10 mg-sm-t-0">
                                    <select name="direction_id" class="form-control" required>
                                      <option value=""> Select Direction</option>
                                      @foreach ($directions as $direction)
                                      <option @if ($direction->id == $shelf->direction_id) Selected @endif value="{{ $direction->id }}">{{ $direction->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-sm-12 mt-3">
                                  <label class="form-control-label">Shelf Name: <span class="tx-danger">*</span></label>
                                  <div class="mg-t-10 mg-sm-t-0">
                                      <input type="text" name="name" class="form-control" placeholder="Enter Shelf Name" value="{{ $shelf->name }}" required>
                                  </div>
                              </div>
                              <div class="col-sm-12 mt-3">
                                  <label class="form-control-label">Shelf Number: <span class="tx-danger">*</span></label>
                                  <div class="mg-t-10 mg-sm-t-0">
                                      <input type="number" name="number" class="form-control" placeholder="Enter Number Name" value="{{ $shelf->number }}">
                                  </div>
                              </div>
                          </div>

                       

                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.shelf.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('title')
    Admin - Edit Book
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.book.index')}}"> <i class="icon ion-reply text-22"></i> All Books</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Book Info</h6>
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

                    <form action="{{ route('admin.book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                      <div class="row">
                        <div class="col-sm-12 mt-3">
                          <label class="form-control-label">Book Name: <span class="tx-danger">*</span></label>
                          <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="name" class="form-control" placeholder="Enter Book Name" value="{{ $book->name }}" required>
                          </div>
                      </div>

                      <div class="col-sm-12 mt-3">
                        <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                          <select name="class_id" class="form-control">
                            <option value=""> Select Class</option>
                            @foreach ($classes as $class)
                            <option @if ($class->id == $book->class_id) Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12 mt-3">
                        <label class="form-control-label">Group Name: <span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                          <select name="group_id" class="form-control">
                            <option value=""> Select Group</option>
                            @foreach ($groups as $group)
                            <option @if ($group->id == $book->group_id) Selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12 mt-3">
                        <label class="form-control-label">Shelf Name: <span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                          <select name="shelf_id" class="form-control">
                            <option value=""> Select Shelf</option>
                            @foreach ($shelves as $shelf)
                            <option  @if ($shelf->id == $book->shelf_id) Selected @endif value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="col-sm-12 mt-3">
                        <label class="form-control-label">Total Set: <span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                          <input type="number" name="total_set" class="form-control" placeholder="Enter Total Set Number" value="{{ $book->total_set }}" required>
                        </div>
                    </div>


                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.book.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

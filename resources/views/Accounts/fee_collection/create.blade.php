
<section class="content-head data-create" style="display:none;">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div id="create_errors"></div>
                    <div class="card-header  p-1">
                        <h3 class="card-title m-0">Add Fee Collection</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="data-form-create" action="{{route('account_head.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Session </label>
                                    <select name="session" class="form-control">
                                        <option value=""> select session</option>
                                        @foreach ($sessions as  $session)
                                        <option @if(old('category') == $session->id) selected @endif value="{{ $session->id }}">{{ $session->start_year.' - '.$session->end_year }}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback mb-0"> </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Class </label>
                                    <select name="sc_class" id="sc_class" class="form-control">
                                        <option value=""> select class</option>
                                        @foreach ($classes as  $class)
                                        <option @if(old('category') == $class->id) selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback mb-0"> </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Section</label>
                                    <select name="section" id="section" class="form-control">
                                        <option value=""> select section</option>
                                        
                                    </select>
                                    <span class="invalid-feedback mb-0"> </span>
                                </div>
                            </div>
                            <div id="fee_res_s">
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control custom-select" name="status">
                                            <option @if(old('status')  == '1') selected @endif value="1">Active</option>
                                            <option @if(old('status')  == '0') selected @endif value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-danger btn-cancel">Back</button>
                            <button type="submit" class="btn btn-primary btn-create">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>



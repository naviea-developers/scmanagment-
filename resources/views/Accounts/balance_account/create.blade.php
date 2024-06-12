
<section class="content-head data-create" style="display:none;">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 ">
                <!-- general form elements -->
                <div class="card card-primary">
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
                    <div id="create_errors"></div>
                    <div class="card-header">
                        <h3 class="card-title">Add Account Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="data-form-create" role="form" action="{{route('balance_account.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Method</label>
                                        <select class="form-control selectric @error('method_id') is-invalid @enderror" name="method_id">
                                            <option value="" selected="" disabled="">Select</option>
                                            @foreach($methods as $item)
                                                <option @if(old('method_id') == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('method_id')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('method_id') }} </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Account Head</label>
                                    <input type="hidden" name="account_head_name" id="account_head_name">
                                    <select id="add_account_head" name="account_head" class="form-control @error('account_head') is-invalid @enderror">
                                        <option value="">Select Account</option>


                                    </select>
                                    @error('account_head')
                                    <span class="invalid-feedback mb-0">{{ $errors->first('account_head') }} </span>
                                    @enderror

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control  @error('account_name') is-invalid @enderror" value="{{ old('account_name') }}">
                                        @error('account_name')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('account_name') }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control  @error('bank_name') is-invalid @enderror"  value="{{ old('bank_name') }}">
                                            @error('bank_name')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('bank_name') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <input type="text" name="branch_name" class="form-control  @error('branch_name') is-invalid @enderror"  value="{{ old('branch_name') }}">
                                            @error('branch_name')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('branch_name') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"  value="{{ old('account_number') }}">
                                        @error('account_number')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('account_number') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Routing Number</label>
                                        <input type="text" name="routing_number" class="form-control  @error('routing_number') is-invalid @enderror"  value="{{ old('routing_number') }}">
                                        @error('routing_number')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('routing_number') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input type="text" name="balance" class="form-control  @error('balance') is-invalid @enderror"  value="{{ old('balance') }}">
                                        @error('balance')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('balance') }} </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            {{-- <div class="row">
                                <div class="col-sm-12">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Publication Status</label>
                                        <select class="custom-select" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
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



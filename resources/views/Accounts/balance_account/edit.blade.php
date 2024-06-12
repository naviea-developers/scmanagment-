
<section class="content-head data-update">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 ">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div id="update_errors"></div>
                    <div class="card-header">
                        <h3 class="card-title">Edit Account Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="data-form-update" role="form" action="{{URL::to('balance_account/'.$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Method</label>
                                        <select class="form-control selectric @error('method_id') is-invalid @enderror" name="method_id">
                                            <option value="" selected="" disabled="">Select</option>
                                            @foreach($methods as $item)
                                                @if(old('method_id'))
                                                <option @if(old('method_id') == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                                @else
                                                <option @if($data->method_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('method_id')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('method_id') }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Account Head</label>
                                        <input type="hidden" name="account_head_name" id="account_head_name">
                                        <select id="add_account_head2" name="account_head" class="form-control @error('account_head') is-invalid @enderror">
                                            <option value="">Select Account</option>


                                        </select>
                                        @error('account_head')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('account_head') }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control  @error('account_name') is-invalid @enderror" value="{{ old('account_name') ?? $data->account_name }}">
                                        @error('account_name')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('account_name') }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control  @error('bank_name') is-invalid @enderror"  value="{{ old('bank_name') ?? $data->bank_name }}">
                                            @error('bank_name')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('bank_name') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <input type="text" name="branch_name" class="form-control  @error('branch_name') is-invalid @enderror"  value="{{ old('branch_name') ?? $data->branch_name }}">
                                            @error('branch_name')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('branch_name') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"  value="{{ old('account_number') ?? $data->account_number }}">
                                        @error('account_number')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('account_number') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Routing Number</label>
                                        <input type="text" name="routing_number" class="form-control  @error('routing_number') is-invalid @enderror"  value="{{ old('routing_number') ?? $data->routing_number }}">
                                        @error('routing_number')
                                        <span class="invalid-feedback mb-0">{{ $errors->first('routing_number') }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input type="text" name="balance" class="form-control  @error('balance') is-invalid @enderror"  value="{{ old('balance') ?? $data->balance }}">
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
                                        <label> Status</label>
                                        <select class="custom-select" name="status">
                                            <option value="1" @php if ($data['status'] == 1) { echo "selected"; } @endphp>Active</option>
                                            <option value="0" @php if ($data['status'] == 0) { echo "selected"; } @endphp>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-primary btn-cancel">Back</button>
                            <button type="submit" class="btn btn-primary btn-update">Update</button>
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

<script>
    $('#add_account_head2').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Acount Head',
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.accounts')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    value: $.trim(params.term),
                };
            },
            processResults: function (response) {
                console.log(response);
                return {
                    results: response
                };
            },
            cache: true
        }
    });
    var account_option = new Option("{{ $data->account->title }}","{{ $data->account_head_id }}", true, true);
    $('#add_account_head2').append(account_option).trigger('change');
</script>

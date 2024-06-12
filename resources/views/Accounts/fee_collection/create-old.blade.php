 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
            <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Add Fee Collection</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row row-card-one">
                        <div class="col-sm-12">
                            <!-- form here -->
                            <form method="POST" action="{{route('expense.store')}}" enctype="multipart/form-data" class="add_data_form">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="">Session *</label>
                                        <select name="session" class="form-control">
                                            <option value=""> select session</option>
                                            @foreach ($sessions as  $session)
                                            <option @if(old('category') == $session->id) selected @endif value="{{ $session->id }}">{{ $session->start_year.' - '.$session->end_year }}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Class *</label>
                                        <select name="sc_class" id="sc_class" class="form-control">
                                            <option value=""> select class</option>
                                            @foreach ($classes as  $class)
                                            <option @if(old('category') == $class->id) selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>
                                     <div class="col-md-4">
                                        <label for="">Class *</label>
                                        <select name="section" id="section" class="form-control">
                                            <option value=""> select section</option>
                                           
                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Date*</label>
                                        <input onclick="this.showPicker();" type="text" class="form-control datepicker" name="date"  placeholder="Reason For Expense" value="{{ old('date') ?? date('Y-m-d') }}" />
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Amount*</label>
                                        <input type="text" class="form-control" name="amount" value="{{ old('amount') ?? 0 }}" />
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3">
                                        <label for="">Payment Method</label>
                                        <select name="payment_method" class="form-control" id="add_payment_method">
                                            <option value=""> select Method</option>
                                            @foreach ($methods as $method)
                                            <option @if(old('payment_method') == $method->id) selected @endif value="{{ $method->id }}">{{ $method->name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>
                                    <div class="col-sm-6 bank_show" style="display: none;">
                                        <label for="">Account *</label>
                                        <select id="add_account" name="account" class="form-control">
                                            <option value="">Select Account</option>


                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>


                                    <div class="col-sm-12">
                                        <button class="btn btn-sm btn-primary mt-4 " type="submit">
                                            <i class="fa fa-save pr-2"></i>Save
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

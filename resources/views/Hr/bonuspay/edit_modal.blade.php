 <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
            <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Bonus Pay</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row row-card-one">
                        <div class="col-sm-12">
                            <form method="POST" action="{{route('bonuspay.store')}}" enctype="multipart/form-data" class="edit_data_form">
                                @csrf
                                <div class="row">
                                    <input type="hidden" value="" name="id" id="bonuspayID" value="0" required>
                                    <div class="col-sm-3">
                                        <label for="">Designation *</label>
                                        <select class="form-control " id="desigID2" name="desigID" required>
                                            <option value="">-- Select One --</option>
                                            @foreach($designations as $designation)
                                            <option value="{{$designation->id}}">{{$designation->name}}</option>
                                            @endforeach

                                        </select>
                                        <span class="invalid-feedback mb-0"></span>
                                    </div>
                                    

                                    <div class="col-sm-3">
                                        <label for="">Employee ID *</label>
                                        <select class="form-control " id="empID2" name="empID" required>
                                            <option value="">-- wait --</option>
                                        </select>
                                        <span class="invalid-feedback mb-0"></span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Paid Date *</label>
                                        <input type="date"  class="form-control datepicker" name="paidDate" id="paidDate" required/>
                                        <span class="invalid-feedback mb-0"></span>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">Occasion</label>
                                        <input type="text" name="occation" id="occation" class="form-control">
                                        <span class="invalid-feedback mb-0"></span>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="">Bonus Amount *</label>
                                        <input type="number" step="any" class="form-control " name="bonusAmount" id="bonusAmount" placeholder="12000" required/>
                                        <span class="invalid-feedback mb-0"></span>
                                    </div>
                                   <div class="col-sm-3">
                                       <label for="">Payment Method</label>
                                        <select name="payment_method" class="form-control" id="payment_method">
                                            <option value=""> select Method</option>
                                            @foreach ($methods as $method)
                                            <option @if(old('payment_method') == $method->id) selected @endif value="{{ $method->id }}">{{ $method->name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>

                                   <div class="col-sm-6 bank_show">
                                        <label for="">Account *</label>
                                        <select id="edit_account" name="account" class="form-control">
                                            <option value="">Select Account</option>


                                        </select>
                                        <span class="invalid-feedback mb-0"> </span>
                                    </div>



                                    <div class="col-sm-3">
                                        <button class="btn btn-sm btn-primary mt-4 " type="submit">
                                            <i class="fa fa-save pr-2"></i>Pay
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

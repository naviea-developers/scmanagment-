@extends('Backend.layouts.layouts')

@section('title', 'batch Details')

{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/class.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/class.css">
@section('main_contain')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>View Batch Details</h4>
                      <p class="mg-b-0">Batch Details Here</p>
                    </div>
                  </div>

                <div class="classDetails">

                    {{-- @foreach ($classes as $cl) --}}

                        <div class="col-12">
                            <a href="{{ route('admin.batch.edit', $batch->id) }}"
                            class="btn btn-primary btn-sm editBtn">
                                <i class="fa-duotone fa-pen-to-square"></i> Edit Batch Data
                            </a>

                            <a href="{{ route('admin.batch.delete', $batch->id) }}" 
                                class="btn btn-danger btn-sm editBtn">
                                <i class="fa-duotone fa-trash"></i> Delete Batch
                            </a>

                        </div>

                        <div class="col-12">
                            <div class="className">
                                {{ @$batch->class->name }}
                            </div>
                        </div>

                        <div class="col-12">
                           <div class="row">
                                <div class="col-6">
                                    Total Student : 100
                                </div>
                                <div class="col-6 text-right">
                                    Class Duration : {{ $batch->duration }}
                                </div>
                           </div>
                        </div>

                        <div class="col-12">
                            <div class="classWeek">
                                Class Day : <b>@foreach ($batch->batchDay as $item)
                                    {{ $item->day }},
                                @endforeach</b>
                            </div>
                        </div>

                        <div class="col-12">

                            <div class="routineTable">
                                {{-- @foreach ($class_routine as $cr)
                                    {!! $cr->class_routine !!}
                                @endforeach --}}
                            </div>

                        </div>

                    {{-- @endforeach --}}
                </div>

            </div>


        </div>



</div>


{{-- 
<div id="datamodalshow" class="modal fade">
    <div class="modal-dialog modal-dialog-top" role="document">
    <div class="modal-content tx-size-sm">
        <div class="modal-body tx-center pd-y-20 pd-x-20">
            <form action="{{ route('admin.batch.delete') }}" method="post">
                @csrf
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                 <input type="hidden" name="batch_id" id="modal_data_id">
                <button type="submit" class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                    yes
                </button>
                <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                    No
                </button>
            </form>
        </div><!-- modal-body -->
    </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal --> --}}

@endsection

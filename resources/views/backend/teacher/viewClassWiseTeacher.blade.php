@extends('backend.master')

@section('title', 'View Class Wise Teacher\'s')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">


        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>View Class Wise Teacher's</h4>
                      <p class="mg-b-0">All Class Details Here</p>
                    </div>
                  </div>

                    <h2></h2>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Choose A Class For All Detailse</label>
                            <select name="" class="form-select" id="ChooseClass">
                                 <option disabled selected>Select Class</option>
                                @foreach ($classlist as $cli)
                                    <option value="{{ $cli->class_id }}">
                                        {{ $cli->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row" id="showData" style="margin-top: 40px">

                    </div>

            </div>

        </div>
<script src="js/custom/viewClassWiseTeacher.js"></script>
</div>
@stop

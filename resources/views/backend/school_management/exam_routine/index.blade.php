@extends('Backend.layouts.layouts')

@section('title','All Exam')
{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">
@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
@section('main_contain')

  <div class="br-mainpanel">
      <div class="p-2">
          <div class="br-section-wrapper">
              <div class="br-pagetitle">
                  <i class="fa-duotone fa-chalkboard-user"></i>
                  <div>
                    <h4>View All Exam Routine</h4>
                    <p class="mg-b-0">Manage all Exam Routine</p>
                  </div>
              </div>

              <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
                  <div class="row">
                    <div class="col-md-11">
                        <label class="form-control-label"><b>Exam title:</b></label>
                        <select class="form-control form-select select2" id="examination_id">
                            <option value="">Select Exam Title</option>
                            @foreach ($examinations as $examination)
                            <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                            @endforeach
                        </select>
                    </div>               
                  </div>
              </div>
              <div class="get-exam-routine-show"></div>
          </div>
      </div>
  </div>

@endsection


@section('script')

<script>
  $(document).on('change','#examination_id',function(e){
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    $.ajax({
      type:'GET',
      url:"{{ url('get-exam-routine') }}/"+id,
      success:function(data){
        $(".get-exam-routine-show").html(data);
      }

    });



  });
</script>
@endsection
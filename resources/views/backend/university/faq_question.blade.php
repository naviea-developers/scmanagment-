@section('title')
FAQ Question
@endsection
@extends('Backend.layouts.layouts')
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All University FAQ</h6>
               {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button>
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message End --}}

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-10p">University Name</th>
                    <th class="wd-15p">User Name</th>
                    <th class="wd-15p">User Email</th>
                    <th class="wd-15p">Date</th>
                    <th class="wd-15p">User Question</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($faq_questions) > 0)
                    @foreach ($faq_questions as $k=> $faq_question)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td> {{ @$faq_question->university->name }} </td>
                          <td> {{ @$faq_question->name }} </td>
                          <td> {{ @$faq_question->email }} </td>
                          <td> {{ date('d-m-Y',strtotime($faq_question->created_at)) }}</td>
                          <td> {{ @$faq_question->question }} </td>
                         
                          <td>
                            {{-- <a class="btn text-info" href="{{ route('admin.review.edit', $review->id) }}"><i class="icon ion-compose tx-28"></i></a> --}}
                            <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal{{ $k }}">Answer</button>
                            <button class="btn text-danger bg-white"  value="{{$faq_question->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                          </td>
                      </tr>




                      
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ @$faq_question->university->name }} FAQ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.university_faq_answer', $faq_question->id) }}" method="POST">
            @csrf
            
            <div class="modal-body">
                <h6 class="title">User Name: <b>{{ $faq_question->name }}</b></h6>
                <h6 class="title">User Email: <b>{{ $faq_question->email }}</b></h6>
                <h6 class="title">University Name: <b>{{ @$faq_question->university->name }}</b></h6>
                <h6 class="title">Date: <b> {{ date('d-m-Y',strtotime($faq_question->created_at)) }}</b></h6>
                <h6 class="title">Question: <b>{{ @$faq_question->question }}</b></h6>
                
               
                <label class="title">Answer</label>
                <br>
                <textarea type="text" name="answer" rows="5" class="form-control col-md-12" required>{{ $faq_question->answer }}</textarea>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit Answer</button>
            </div>
        </form>
      </div>
    </div>
  </div>



                    @endforeach
                  @endif

                </tbody>
              </table>
            </div><!-- table-wrapper -->


          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        <footer class="br-footer">
          {{-- <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div> --}}
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!--_-- ########### Start Add Category MODAL ############---->


    <!--_-- ########### End Add Category MODAL ############---->


    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="datamodalshow" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form action="{{ route('admin.university_faq_answer_delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="university_faq_answer_id" id="modal_data_id">
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
    </div><!-- modal -->

    <!--_-- ########### End Delete Category MODAL ############---->

@endsection

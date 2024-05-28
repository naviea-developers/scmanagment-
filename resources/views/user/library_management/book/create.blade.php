@extends('user.layouts.master-layout')
@section('head')
@section('title','- Create Book')


@endsection
@section('main_content')

    
    <div class="right_section">
        <div>
            <h4 style="color: var(--seller_text_color)">Add New Book</h4>
        </div>
    </div>
    <div class="passwodBox mb-3 col-md-12" style="background-color: var(  --seller_frontend_color); color:white">
        <form action="{{ route('teacher.library_book.store', auth()->user()->id) }}" method="POST" style="margin-top: 0%">
            @csrf
               
            <div class="row">

                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Book Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" style="width: 100%" class="form-control" placeholder="Enter Book Name" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                  <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <select name="class_id" class="form-control" id="class">
                      <option value=""> Select Class</option>
                      @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-sm-4 mt-3">
                  <label class="form-control-label">Group Name:</label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <select name="group_id" class="form-control" id="group">
                      <option value=""> Select Group</option>
                      {{-- @foreach ($groups as $group)
                      <option value="{{ $group->id }}">{{ $group->name }}</option>
                      @endforeach --}}
                    </select>
                  </div>
                </div>

                <div class="col-sm-4 mt-3">
                  <label class="form-control-label">Shelf Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <select name="shelf_id" class="form-control">
                      <option value=""> Select Shelf</option>
                      @foreach ($shelves as $shelf)
                      <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="col-sm-4 mt-3">
                  <label class="form-control-label">Total Set: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <input type="number" name="total_set" style="width: 100%" class="form-control" placeholder="Enter Total Set Name" value="{{ old('total_set') }}" required>
                  </div>
              </div>
           
               
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <button type="submit" class="btn btn-info ">Save</button>
                </div>
              </div>

        </form>
    </div>
@endsection



@section('script')

<script>
    $('body').on("change",'#class',function(){
        let id = $(this).val();
            console.log(id);
        getGroup(id,"group");
    });


    function getGroup(id,outid){
      let url = '{{ url("get/group/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select group</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.name + "</option>"
              });


              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
    }




        
</script>
@endsection
@extends('backend.student.master')

@section('content')
    <div class="row mt-5">
      
        
        <div class="col-md-6">
            <div class="card p-3">
               <h3>Add New Homework</h3>
                
                <form action="/uploadHW" method="post" enctype='multipart/form-data'>
                        @csrf
                    <div class="row p-4" style="margin-top:-10px;">
                        <lable>Choose Class</lable>
                        <select class="form-control" name="classname">
                            @foreach($classList as $i=>$cls) 
                    
                                @foreach($classBysub as $clsSub)
                     
                                    @if($cls->batch_id == $clsSub->class_id)
                                        <option value="{{ $cls->batch_id }}">{{ $cls->batch_name }}</option>
                                    @endif
                                    
                                @endforeach
                            
                            @endforeach
                        </select>
                    </div>
                    
                     <div class="row p-4" style="margin-top:-30px;">
                        <lable>Subject</lable>
                        <input type="text" class="form-control" value="{{ $clsSub->subject }}" name="subject" readonly>
                    </div>
                    
                    
                    <div class="row p-4" style="margin-top:-30px;">
                        <lable>Home work Image</lable>
                        <input type="file" accept="image/*" name="img" class="form-control">
                    </div>
                    
                    
                    
                    <div class="row p-4" style="margin-top:-30px;">
                        <lable>Details</lable>
                        <textarea class="form-control" name="data" style="resize:none;" id="editor" rows="5"></textarea>
                    </div>
                    
                    <center>
                        <button class="btn btn-info btn-sm">Add Now</button>
                    </center>
                    
                </form>
                
            </div>
        </div>
        
        <div class="col-md-6">
            
            @foreach($hw as $h)
            
                <p style="margin-bottom: -1px;font-weight: bold;">
                    Date & Time : {{ $h->created_at }} 
                </p>
            
                <div class="card p-2 mb-3">
                   
                    <h3>{{ str_replace("."," ", $h->classId); }}</h3>
                    <span> {{ $h->subject }} </span>
                    <p>{{ $h->details }}</p>
                   
                </div>
            
            @endforeach
            
        </div>
           
    </div>

<style>

</style>
@endsection

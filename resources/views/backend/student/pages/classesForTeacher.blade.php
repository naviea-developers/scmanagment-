@extends('backend.student.master')

@section('content')
    <div class="row mt-5">
      
        <div class="col-12">
            <h1>Hello Teacher</h1>
            <p style="margin-top:-10px;">Here is your class routine</p>
        </div>
        
        <div class="col-12">
            <div class="card p-2">
               
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Class Name</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Class Duration</th>
                      <th scope="col">Weekly</th>
                      <th scope="col">Start</th>
                      <th scope="col">End</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                    @foreach($classList as $i=>$cls) 
                    
                        @foreach($classBysub as $clsSub)
                     
                            @if($cls->batch_id == $clsSub->class_id)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $cls->batch_name }}</td>
                                    <td>{{ $clsSub->subject }}</td>
                                    <td>{{ $cls->class_duration }}</td>
                                    <td>{{ $cls->weekly }}</td>
                                    <td>{{ $cls->class_start }}</td>
                                    <td>{{ $cls->class_end }}</td>
                                </tr>
                            @endif
                         
                        @endforeach
                    
                    @endforeach
                      
                    
                   
                    
                    
                  </tbody>
                </table>
               
            </div>
        </div>
           
    </div>

<style>

</style>
@endsection

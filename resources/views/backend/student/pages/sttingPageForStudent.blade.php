@extends('backend.student.master')

@section('content')

    {{--

             <div class="col col-lg-3 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;margin-top: 10px;margin-left: 30px;">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Class Name</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main> --}}
    <section style="background-color:">
            <div class="row mt-5">
                
                <style>
                    
                    .passwordBox {
                        height: 350px;
                        width: 450px;
                        background: linear-gradient(296deg, #1167b1, #03254cc7);
                        margin: 0 auto;
                        display: block;
                        border-radius: 10px;
                        padding: 15px;
                        color: #e5e5e5;
                        margin-top: 5%;
                    }
                    
                    .passwordBox input{
                        background: #e5e5e5;
                    }
                    
                </style>
                
                <div class="passwordBox">
                    <h1>Change Password</h1>
                    
                    <form action="/changeStudentPassword" method="POST">
                        @csrf
                        <lable>Current Password</lable>
                        <input type="text" class="form-control" name="currentPass" value="{{ $user->pass }}">
                            
                            <hr style="background: #fff;">  
                        
                         <lable>New Password</lable>
                        <input type="text" class="form-control" name="newpass">  
                        
                         <lable>Confirm Password</lable>
                        <input type="text" class="form-control" name="conPass">
                            <br>
                        <center>
                            <button class="btn btn-light">
                                Change Password
                            </button>
                        </center>
                        
                    </form>
                    
                </div> 
            
            </div>
            </div>
        </div>
    </section>

@endsection

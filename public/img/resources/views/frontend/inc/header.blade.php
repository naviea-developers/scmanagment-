<div class="header">
    <div class="container-fluid">
        <div class="searchbox">
            <div class="row">
                <div class="col-md-4">
                    <a href="/"><img src="{{ asset('frontend/img/footer_logo.png') }}" alt=""></a>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href="/booking/air">
                                <i class="fa-duotone fa-paper-plane"></i>
                                Flight
                            </a>
                        </li>
                        <li>
                            <a href="/booking/bus">
                                <i class="fa-duotone fa-bus"></i>
                                Bus
                            </a>
                        </li>
                        <li>
                            <a href="/booking/car">
                                <i class="fa-duotone fa-car"></i>
                                Car
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-duotone fa-building"></i>
                                Hotel
                            </a>
                        </li>
                        <li>
                            <a href="/Shop-Category">
                                <i class="fa-duotone fa-shop"></i>
                                Shop
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <ul>
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">
                                  <img src="https://cdn.britannica.com/79/5779-050-46C999AF/Flag-Saudi-Arabia.jpg" alt="">
                                  SR
                                </button>
                                <ul class="dropdown-menu">
                                  <li>
                                    <button class="btn">
                                        <img src="https://media.gettyimages.com/id/480595523/video/bangladesh-flag.jpg?s=640x640&k=20&c=7dQk2QqsqkPf9iB9MK5VyERlqC7qvhr4q1T9ENuGaOE=" alt="">
                                         BDT
                                      </button>
                                  </li>
                                  <li>
                                    <button class="btn">
                                        <img src="https://purepng.com/public/uploads/large/purepng.com-american-flagflagscountrylandflag-831523995311m0uxm.png" alt="">
                                         USD
                                      </button>
                                  </li>
                                  <li>
                                    <button class="btn">
                                        <img src="https://www.pngkey.com/png/detail/248-2483778_flag-of-india-national-flag-computer-icons-indian.png" alt="">
                                         INR
                                      </button>
                                  </li>

                                </ul>
                              </div>
                        </li>
                        <li>
                            <a href="" class="bas">
                                Become a seller
                            </a>
                        </li>
                        @if(session()->get('userId'))
                        <li>
                            <a href="/userProfile" class="btn" style="background:none; border:none; outline:none;"><i class=" fas fa-user"></i></a>
                        </li>
                        @else
                        <li>
                            <a href="/signin" class="sign">
                                Sign In
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

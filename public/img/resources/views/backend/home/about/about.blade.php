<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>About</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>About Information</span>
            </div>

            <div class="card">
                <h2>About Us</h2>

                <form action="updateAbout" method="post">

                    @csrf

                    @foreach ($about as $ab)


                        @php
                            if ($ab->about > 0) {
                                $about = $ab->about;
                            }else{
                                $about = ' ';
                            }

                        @endphp


                    @endforeach

                    <textarea name="aboutUs" id="" class="form-control" cols="30" rows="10">{{ $about }}</textarea>

                    <br>

                    <button class="btn btn-ligh">
                        update
                    </button>

                </form>

            </div>
        </div>
    @include('inc.js')


  </body>
</html>

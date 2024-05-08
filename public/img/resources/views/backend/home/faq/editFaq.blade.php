<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Edit FAQ</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Edit FAQ</span>
            </div>


            @foreach ($editFaq as $item)


                <div class="card">
                    <form action="UpdateFaq" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mb-3">
                            <label for="">Question * </label>

                            <input type="text" name="faqQue" class="form-control" value="{{ $item->question }}">

                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Answer *</label>

                            <textarea name="faqans" id="" cols="30" rows="10" class="form-control resize-none">{{ $item->answer }}</textarea>

                        </div>

                        <input type="hidden" name="id" value="{{ $item->id }}">

                        <button class="btn btn-info">
                            Update
                        </button>

                        <a href="/" class="btn btn-danger" style="float: right;">
                            Go Back
                        </a>

                    </form>
                </div>


            @endforeach


        </div>

    @include('inc.js')
  </body>
</html>

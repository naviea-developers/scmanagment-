<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS - Admin</title>

    @include('inc.links')

    <link rel="stylesheet" href="css/custom/index.css">

</head>
<body>

    @if (\Session::has('msg'))
    <div class="toast show" role="alert" aria-live="assertive"
    aria-atomic="true" style="float: right">
        <div class="toast-header">
        <img src="img/logo.png" style="height: 25px;weight:25px;"
        class="rounded me-2" alt="...">
        <strong class="me-auto">@include('inc.sitename')</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast"
        aria-label="Close"></button>
        </div>
        <div class="toast-body" style="text-transform: capitalize;">
            {!! \Session::get('msg') !!}
        </div>
    </div>
@endif

    <div class="adminPanelLogin admin-singup">
        <h2 class="mb-3">Join with Us</h2>
        <div class="formgroup">
            <form action="{{ route('reg') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">
                        <i class="fa-duotone fa-user"></i> Name :
                    </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">
                        <i class="fa-duotone fa-at"></i> Email :
                    </label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">
                        <i class="fa-duotone fa-lock"></i> Password :
                    </label>
                    <input type="text" name="pass" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">
                        <i class="fa-duotone fa-house"></i> Address :
                    </label>
                    <input type="text" name="add" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">
                        <i class="fa-duotone fa-user-tie"></i> Role :
                    </label>

                    <select name="role" id="" class="form-select">
                        <option value="teacher">
                            Teacher</option>
                        <option value="student">
                            Student</option>
                    </select>
                </div>

                <button class="btn btn-success">
                    Signup  <i class="fa-duotone fa-handshake"></i>
                </button>
            </form>

            <div class="bottomGroup">

                <hr>

                <center>
                    Already have an account ? <a href="/admin">login</a>
                </center>

            </div>

        </div>
    </div>



</body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/login.css" />
  </head>

  <body>
    <header></header>

    <main>
      <section class="log_in_innerSect">
        <div class="login_container">
          <div class="container">
            <div class="login_Contains" style="max-width: 400px;">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login_formRightContent">
                    <div class="form_title">
                      <h4>Navieasoft</h4>
                      <p>Sign In</p>
                    </div>
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    @endif
                    <!-- ======   Login Formn  =============== -->
                    <form method="POST" action="{{ route('admin.login.post') }}" class="row g-3">
                        @csrf
                      <div class="col-md-12">

                        <input type="email" :value="__('email')" class="form-control fc-outline-dark" placeholder="Enter your username" name="email" :value="old('email')" required autocomplete="email">

                      </div>
                      <div class="col-md-12">
                        <div class="input-box">
                          {{-- <input
                            type="password"
                            class="form-control password-Input"
                            id="inputPassword4"
                            placeholder=".........."
                          /> --}}
                          <input type="password" name="password" id="password" class="form-control fc-outline-dark" placeholder="Enter your password" :value="old('password')" required autocomplete="current-password">
                          <a href="#" class="show-password">

                            <i class="fa-solid fa-eye-slash"></i>
                          </a>
                        </div>
                      </div>

                      {{-- <div class="col-lg-12">
                        <div class="Check_user">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="flexCheckDefault"
                            />
                            <label for="flexCheckDefault">Remember me </label>
                          </div>
                          <div class="forgate">
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                          </div>
                        </div>
                      </div> --}}

                      <div class="col-12">
                        <div class="submitBtn">
                          <button type="submit" class="btn btn-primary">
                            Sign In
                          </button>
                        </div>
                      </div>
                    </form>




                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer></footer>

    <script>
      // =============  Show password
      const inputPasswordElement = document.querySelector(".password-Input");
      const ShowBtnPass = document.querySelector(".show-password");

      ShowBtnPass.addEventListener("click", (e) => {
        e.preventDefault();
        ///  Change the icon element
        const showIcons = document.querySelector(".show-password i");
        if (inputPasswordElement.type === "password") {
          inputPasswordElement.type = "text";
          showIcons.classList.replace("fa-eye-slash", "fa-eye");
        } else {
          showIcons.classList.replace("fa-eye", "fa-eye-slash");
          inputPasswordElement.type = "password";
        }
      });
    </script>
  </body>
</html>

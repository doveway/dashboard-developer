<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon link -->
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/images/bss-favicon.png'); }}" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-css/bootstrap.min.css'); }}" crossorigin="anonymous" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ URL::asset('fontawesome/css/fontawesome.css'); }}" rel="stylesheet" />
  <link href="{{ URL::asset('fontawesome/css/brands.css'); }}" rel="stylesheet" />
  <link href="{{ URL::asset('fontawesome/css/solid.css'); }}" rel="stylesheet" />

  <!-- custom CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/custom-css/header.css'); }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/custom-css/footer.css'); }}" />

  <title>Dashboard - Developer Login</title>
</head>

<body class="body">
  <!-- Preloader starts here -->
  <!-- <div id="preloader">
    <div class="loader"></div>
  </div> -->
  <!-- Preloader ends here -->

  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light px-4 py-0 d-lg-flex d-none">
      <a class="navbar-brand" href="index.html">
        <img class="img-fluid pr-3 " style="border-right: 1px solid #E1E2E4;" src="{{ URL::asset('images/bss-logo.svg'); }}"
          alt="logo" />
      </a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
        <div class="" style="width: 49%; font-weight: 600; color: #222222">
          <p>Elite Developers Portal</p>
        </div>
      </div>
    </nav>

    <!-- mobile menu bar -->
    <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none pl-2 pr-2 py-3">
      <!-- <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="./assets/images/menu-burger.svg" alt="" />
      </button> -->
      <div style="width: 32.5%" class="">
        <a href="index.html">
          <img class="img-fluid pr-3 " style="border-right: 1px solid #E1E2E4;" src="{{ URL::asset('images/bss-logo.svg'); }}"
            alt="logo" />
        </a>
      </div>


      <div class="" style="width: 49%; font-weight: 600; color: #222222">
        <p>Elite Developers Portal</p>
      </div>
      <!-- <div class="d-flex user-container">
        <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
          <p class="m-0">JD</p>
          <div class="active-user"></div>
        </div>
      </div> -->
      <!-- <div class="d-lg-none d-block nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
        data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <img class="img-fluid" src="./assets/images/user-mobile2.svg" alt="" />
      </div> -->


      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="{{ URL::asset('images/menu-burger.svg'); }}" alt="" />
      </button>

      <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">

      </div>
    </nav>
  </header>


  <main class="container d-flex flex-column justify-content-center " style="flex: 1">
    <div class="row justify-content-center">
      <div class="col-12 col-md-4">
        <form class="form-row" id = "frm_login" class="d-none">
          @csrf
          <div class="col-12 py-4" style="font-size: 34px; font-weight: 600;">
            <p>Login</p>
          </div>
          <div class="form-group col-12 pb-3">
            <input type="text" class="form-control input-custom" id="email" placeholder="Email" name="email">
          </div>
          <div class="form-group col-12 pb-3">
            <input type="password" class="form-control input-custom" id="password" placeholder="Password" name = "password">
          </div>
          <div class="col-12 pb-3" id="err" style = "color: red"></div>
          <div class="col-12 pb-3">
            <button type="button" class="btn primary-background default-border-radius btn-block" onclick = "login()">Login</button>
          </div>
          <div class="col-12 py-2">
            <a class="primary-text-color custom-font-size-13 text-decoration-none" href="#">Forgot password?</a>
          </div>
        </form>
      </div>
    </div>

  </main>

  <footer>
    <div class="container-fluid">
      <div class="row justify-content-start">
        <div class="col-12">
          <p>&copy; Copyright 2023 Buysmallsmall by Smallsmall Technology Ltd
        </div>
        </nav>
      </div>
  </footer>

  <!-- Jquery js -->
  <script src="{{ URL::asset('js/jquery.min.js'); }}" crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->
  <script src="{{ URL::asset('js/popper.min.js'); }}" crossorigin="anonymous"></script>
  <script src="{{ URL::asset('js/bootstrap-js/bootstrap.min.js'); }}" crossorigin="anonymous"></script>

  <!-- <script>
    // $(document).ready(function () {
    const preloader = $("#preloader");
    window.addEventListener("load", function () {
      preloader.css("display", "none");
    });
      // });
  </script> -->

  <script>
    
    function login()
    {
        if($('#email').val() == "")
        {
            $('#email').addClass('has-error');
            $("#err").html("Email field cannot be empty");
            return false;
        }

        else if($('#password').val() == "")
        {
            $('#password').addClass('has-error');
            $("#err").html("Password field cannot be empty");
            return false;
        }

        else
        {
            var data = $("#frm_login").serialize();

            //alert(data);

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            var email = document.getElementById('email').value;

            var password = document.getElementById('password').value;
                
            var data = {"email" : email, "password" : password, _token: '{{csrf_token()}}'};

            //console.log(data);

            $.ajax({
    
                url : '/login/check',

                type: "POST",

                async: true,

                data: data,

                success	: function (response){
                    
                    if(response == 0)
                    {
                      window.location.replace('/projectPayout');
                    }

                    if(response == 1)
                    {
                        window.location.replace('/home');
                    }

                    else if(response == 2)
                    {
                        $("#err").html("Email or Password is incorrect Please Check");
                    }
                    console.log(response);
                    //window.location.href= data
                }
            });
        }
    }

  </script>
</body>

</html>
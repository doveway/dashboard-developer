<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon link -->
    <link rel="icon" type="image/x-icon" href="assets/images/bss-favicon.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-css/bootstrap.min.css'); }}" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ URL::asset('fontawesome/css/fontawesome.css'); }}" rel="stylesheet" />
    <link href="{{ URL::asset('fontawesome/css/brands.css'); }}" rel="stylesheet" />
    <link href="{{ URL::asset('fontawesome/css/solid.css'); }}" rel="stylesheet" />

    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/custom-css/header.css'); }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/custom-css/footer.css'); }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/custom-css/index.css'); }}" />

    <title>Dashboard - Developer add-project</title>
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
            <a class="navbar-brand" href="/">
                <img class="img-fluid pr-3 " style="border-right: 1px solid #E1E2E4;" src="{{ URL::asset('images/bss-logo.svg'); }}" alt="logo" />
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse justify-content-between">
                <div class="" style=" width: 49%; font-weight: 600; color: #222222">
                    <p>CX Portal</p>
                </div>
                <ul class="justify-content-end nav">
                    <li class="nav-item mx-3">
                        <a href="https://buysmallsmall.ng">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                            d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22M12 2C9.49872 4.73835 8.07725 8.29203 8 12C8.07725 15.708 9.49872 19.2616 12 22M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22M2.50002 9H21.5M2.5 15H21.5"
                            stroke="#222224" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="https://intercom.help/BuySmallsmall/en">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                            d="M9.09 9C9.3251 8.33167 9.78915 7.76811 10.4 7.40913C11.0108 7.05016 11.7289 6.91894 12.4272 7.03871C13.1255 7.15849 13.7588 7.52152 14.2151 8.06353C14.6713 8.60553 14.9211 9.29152 14.92 10C14.92 12 11.92 13 11.92 13M12 17H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                            stroke="#222224" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M14 21H10M18 8C18 6.4087 17.3679 4.88258 16.2427 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.8826 2.63214 7.75738 3.75736C6.63216 4.88258 6.00002 6.4087 6.00002 8C6.00002 11.0902 5.22049 13.206 4.34968 14.6054C3.61515 15.7859 3.24788 16.3761 3.26134 16.5408C3.27626 16.7231 3.31488 16.7926 3.46179 16.9016C3.59448 17 4.19261 17 5.38887 17H18.6112C19.8074 17 20.4056 17 20.5382 16.9016C20.6852 16.7926 20.7238 16.7231 20.7387 16.5408C20.7522 16.3761 20.3849 15.7859 19.6504 14.6054C18.7795 13.206 18 11.0902 18 8Z" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <div class="d-flex user-container align-items-center" type="button" data-toggle="dropdown">
                            <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
                                <p class="m-0">JD</p>
                                <div class="active-user"></div>
                            </div>
                            <div class="user-name">
                                <p>JD</p>
                            </div>

                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                        <div class="dropdown-menu" style="left: unset; right: 0">
                            <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10.0001 17.5L9.9167 17.3749C9.33783 16.5066 9.0484 16.0725 8.666 15.7582C8.32746 15.4799 7.93739 15.2712 7.51809 15.1438C7.04446 15 6.52267 15 5.4791 15H4.33341C3.39999 15 2.93328 15 2.57676 14.8183C2.26316 14.6586 2.00819 14.4036 1.8484 14.09C1.66675 13.7335 1.66675 13.2668 1.66675 12.3333V5.16667C1.66675 4.23325 1.66675 3.76654 1.8484 3.41002C2.00819 3.09641 2.26316 2.84144 2.57676 2.68166C2.93328 2.5 3.39999 2.5 4.33341 2.5H4.66675C6.53359 2.5 7.46701 2.5 8.18005 2.86331C8.80726 3.18289 9.31719 3.69282 9.63677 4.32003C10.0001 5.03307 10.0001 5.96649 10.0001 7.83333M10.0001 17.5V7.83333M10.0001 17.5L10.0835 17.3749C10.6623 16.5066 10.9518 16.0725 11.3342 15.7582C11.6727 15.4799 12.0628 15.2712 12.4821 15.1438C12.9557 15 13.4775 15 14.5211 15H15.6667C16.6002 15 17.0669 15 17.4234 14.8183C17.737 14.6586 17.992 14.4036 18.1518 14.09C18.3334 13.7335 18.3334 13.2668 18.3334 12.3333V5.16667C18.3334 4.23325 18.3334 3.76654 18.1518 3.41002C17.992 3.09641 17.737 2.84144 17.4234 2.68166C17.0669 2.5 16.6002 2.5 15.6667 2.5H15.3334C13.4666 2.5 12.5332 2.5 11.8201 2.86331C11.1929 3.18289 10.683 3.69282 10.3634 4.32003C10.0001 5.03307 10.0001 5.96649 10.0001 7.83333" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg><span>&nbsp;&nbsp;&nbsp;Resources</span></a>
                            <a class="dropdown-item" href="/logout"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M13.3333 14.1667L17.5 10M17.5 10L13.3333 5.83333M17.5 10H7.5M7.5 2.5H6.5C5.09987 2.5 4.3998 2.5 3.86502 2.77248C3.39462 3.01217 3.01217 3.39462 2.77248 3.86502C2.5 4.3998 2.5 5.09987 2.5 6.5V13.5C2.5 14.9001 2.5 15.6002 2.77248 16.135C3.01217 16.6054 3.39462 16.9878 3.86502 17.2275C4.3998 17.5 5.09987 17.5 6.5 17.5H7.5" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg><span>&nbsp;&nbsp;&nbsp;Logout</span></a>
                        </div>

                    </li>
                </ul>

        </nav>

        <!-- mobile menu bar -->
        <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none pl-2 pr-2 py-3">
            <!-- <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="./assets/images/menu-burger.svg" alt="" />
      </button> -->
            <div style="width: 32.5%" class="">
                <a href="/home">
                    <img class="img-fluid pr-3 " style="border-right: 1px solid #E1E2E4;" src="{{ URL::asset('images/bss-logo.svg'); }}" alt="logo" />
                </a>
            </div>


            <div class="" style="width: 49%; font-weight: 600; color: #222222">
                <p>CX Portal</p>
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


            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <img class="img-fluid" src="{{ URL::asset('images/menu-burger.svg'); }}" alt="" />
            </button>

            <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">

            </div>
        </nav>
    </header>

    <div class="container">
        <div class="justify-content-md-center row my-3" id="addProject1">
            <div class="col-12 col-md-8 my-3">
                <p class="font-weight-bold">Project details</p>
            </div>
            <div class="col-12 col-md-8">
                <form class="form-row" id="frm_projct" class="d-none">
                    @csrf
                    <div class="row">
                        <!-- 1st column of the form -->
                        <div class=" col-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select id="developer" class="form-control input-custom">
                                        <option selected>Property Developer</option>
                                        @foreach($developers as $developer)
                                        <option value="{{$developer->developer_id}}">{{$developer->company_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="propty" placeholder="Property name" id="propty" class="form-control input-custom">
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select id="availability" class="form-control input-custom">
                                        <option selected>Pick Availability</option>
                                        <option value="locked">Locked</option>
                                        <option value="sold">Sold</option>
                                        <option value="available">Available</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <select id="parentPropty" class="form-control input-custom">
                                        <option selected>Parent Property</option>
                                        @foreach($parents as $parent)
                                        <option value="{{$parent->project_id}}">{{$parent->project_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select id="active" class="form-control input-custom" placeholder="Active">
                                        <option disabled selected>Active</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control input-custom" id="proptyPrice" placeholder="Property Price">
                                </div>
                            </div>

                            <div class="col-12 pb-3" id="err" style="color: red"></div>
                </form>
            </div>
            <div class="col-md-12 col-12  mt-5 ">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="w-100 btn  default-border-radius" type="button" style="border: 2px solid #662D91;">back</a>
                            </div>
                            <div class="col-6">
                                <a href="\home" class="w-100 btn primary-background default-border-radius">Edit </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-12">
                        <button onclick="uploadPropty()" class="w-100 btn primary-background default-border-radius" style="width: 70%" type="button"> Upload Property</button>
                    </div>

                    <div id = "#"></div>
                    
                </div>
            </div>
        </div>
    </div>


    <!-- Jquery js -->
    <script src="{{ URL::asset('js/jquery.min.js'); }}" crossorigin="anonymous"></script>
    <!-- Bootstrap js and Popper js -->
    <script src="{{ URL::asset('js/popper.min.js'); }}" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/bootstrap-js/bootstrap.min.js'); }}" crossorigin="anonymous"></script>


    <script>
        function uploadPropty() {
            if ($('#developer').val() == "") {
                $('#name').addClass('has-error');
                $("#err").html("developer field cannot be empty");
                return false;
            } else if ($('#propty').val() == "") {
                $('#inputState').addClass('has-error');
                $("#err").html("property field cannot be empty");
                return false;
            } else if ($('#availability').val() == "") {
                $('#inputCity').addClass('has-error');
                $("#err").html("availability field cannot be empty");
                return false;
            } else if ($('#parentPropty').val() == "") {
                $('#address').addClass('has-error');
                $("#err").html("parent Property field cannot be empty");
                return false;
            } else if ($('#active').val() == "") {
                $('#active').addClass('has-error');
                $("#err").html("active field cannot be empty");
                return false;
            }else if ($('#proptyPrice').val() == "") {
                $('#proptyPrice').addClass('has-error');
                $("#err").html("proptyPrice field cannot be empty");
                return false;
            }else {
                //var data = $("#frm_login").serialize();

                //alert(data);

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });

                var developer = document.getElementById('developer').value;

                var propty = document.getElementById('propty').value;

                var availability = document.getElementById('availability').value;

                var parentPropty = document.getElementById('parentPropty').value;

                var active = document.getElementById('active').value;

                var proptyPrice = document.getElementById('proptyPrice').value;

                console.log(developer);
                console.log(propty);
                console.log(availability);
                console.log(parentPropty);
                console.log(active);
                console.log(proptyPrice);

                var data = {
                    "developer": developer,
                    "propty": propty,
                    "availability": availability,
                    "parentPropty": parentPropty,
                    "active": active,
                    "proptyPrice": proptyPrice,
                    _token: '{{csrf_token()}}'
                };

                //console.log(data);

                $.ajax({

                    url: '/insertProperty',

                    type: "POST",

                    async: true,

                    data: data,

                    success: function(response) {

                        if (response == 1) {
                            alert('Property Successfully Added');
                            window.location.replace('/insertProject');
                        } else if (response == 2) {
                            alert('something went wrong with the upload');
                        }
                        console.log(response);
                        //window.location.href= data
                    }
                });
            }
        }
    </script>
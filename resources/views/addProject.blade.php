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
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-css/bootstrap.min.css'); }}"/>

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
        <img class="img-fluid pr-3 " style="border-right: 1px solid #E1E2E4;" src="{{ URL::asset('images/bss-logo.svg'); }}"
          alt="logo" />
      </a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse justify-content-between">
        <div class="" style=" width: 49%; font-weight: 600; color: #222222">
          <p>Elite Developers Portal</p>
        </div>
        <ul class="justify-content-end nav">
          <li class="nav-item mx-3">
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                  d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22M12 2C9.49872 4.73835 8.07725 8.29203 8 12C8.07725 15.708 9.49872 19.2616 12 22M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22M2.50002 9H21.5M2.5 15H21.5"
                  stroke="#222224" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </li>
          <li class="nav-item mx-3">
            <a href="#">
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
                <path
                  d="M14 21H10M18 8C18 6.4087 17.3679 4.88258 16.2427 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.8826 2.63214 7.75738 3.75736C6.63216 4.88258 6.00002 6.4087 6.00002 8C6.00002 11.0902 5.22049 13.206 4.34968 14.6054C3.61515 15.7859 3.24788 16.3761 3.26134 16.5408C3.27626 16.7231 3.31488 16.7926 3.46179 16.9016C3.59448 17 4.19261 17 5.38887 17H18.6112C19.8074 17 20.4056 17 20.5382 16.9016C20.6852 16.7926 20.7238 16.7231 20.7387 16.5408C20.7522 16.3761 20.3849 15.7859 19.6504 14.6054C18.7795 13.206 18 11.0902 18 8Z"
                  stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20" fill="none">
                    <path
                      d="M10.0001 17.5L9.9167 17.3749C9.33783 16.5066 9.0484 16.0725 8.666 15.7582C8.32746 15.4799 7.93739 15.2712 7.51809 15.1438C7.04446 15 6.52267 15 5.4791 15H4.33341C3.39999 15 2.93328 15 2.57676 14.8183C2.26316 14.6586 2.00819 14.4036 1.8484 14.09C1.66675 13.7335 1.66675 13.2668 1.66675 12.3333V5.16667C1.66675 4.23325 1.66675 3.76654 1.8484 3.41002C2.00819 3.09641 2.26316 2.84144 2.57676 2.68166C2.93328 2.5 3.39999 2.5 4.33341 2.5H4.66675C6.53359 2.5 7.46701 2.5 8.18005 2.86331C8.80726 3.18289 9.31719 3.69282 9.63677 4.32003C10.0001 5.03307 10.0001 5.96649 10.0001 7.83333M10.0001 17.5V7.83333M10.0001 17.5L10.0835 17.3749C10.6623 16.5066 10.9518 16.0725 11.3342 15.7582C11.6727 15.4799 12.0628 15.2712 12.4821 15.1438C12.9557 15 13.4775 15 14.5211 15H15.6667C16.6002 15 17.0669 15 17.4234 14.8183C17.737 14.6586 17.992 14.4036 18.1518 14.09C18.3334 13.7335 18.3334 13.2668 18.3334 12.3333V5.16667C18.3334 4.23325 18.3334 3.76654 18.1518 3.41002C17.992 3.09641 17.737 2.84144 17.4234 2.68166C17.0669 2.5 16.6002 2.5 15.6667 2.5H15.3334C13.4666 2.5 12.5332 2.5 11.8201 2.86331C11.1929 3.18289 10.683 3.69282 10.3634 4.32003C10.0001 5.03307 10.0001 5.96649 10.0001 7.83333"
                      stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg><span>&nbsp;&nbsp;&nbsp;Resources</span></a>
                <a class="dropdown-item" href="/logout"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20" fill="none">
                    <path
                      d="M13.3333 14.1667L17.5 10M17.5 10L13.3333 5.83333M17.5 10H7.5M7.5 2.5H6.5C5.09987 2.5 4.3998 2.5 3.86502 2.77248C3.39462 3.01217 3.01217 3.39462 2.77248 3.86502C2.5 4.3998 2.5 5.09987 2.5 6.5V13.5C2.5 14.9001 2.5 15.6002 2.77248 16.135C3.01217 16.6054 3.39462 16.9878 3.86502 17.2275C4.3998 17.5 5.09987 17.5 6.5 17.5H7.5"
                      stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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


  <main class="container-fluid d-flex flex-column " style="flex: 1">
    <div class="row pt-md-5 pt-2">
      <div class="col-md-3 col-12 ">
        <div class="d-flex align-items-center side-bar">
          <div class="developer-logo">
            <img src="{{ URL::asset('images/terra-logo.png'); }}" alt="">
          </div>
          <div class="developer-name my-3">
            <p>{{$developerName}}</p>
          </div>
          <div class="developer-stats d-flex py-2 px-4 ">
            <table>
              <tr class="text-center font-weight-bold">
                <td>{{$proptyCount}}</td>
                <td>{{$totalActive}}</td>
                <td>{{$totalSold}}</td>
              </tr>

              <tr class="text-center">
                <td>Portfolio</td>
                <td>Active</td>
                <td>Sold</td>
              </tr>
            </table>
          </div>
          <div class="d-md-block d-none my-4">
            <div>
              <a href="/addProject"><button class="btn primary-background default-border-radius" type="button"> <svg
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg> Add Project</button></a>
            </div>

            <div class="divider mt-5 mb-3"></div>
            <div class="text-center">
              <p style="font-size: 12px">Contact Support</p>
              <p class="custom-font-size-13">hello@buysmallsmall.ng</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8  col-12">
        <div class="my-md-0 my-4">
          <p style="font-weight: 600; font-size: 20px;">Welcome, {{$developerName}} <img src="{{ URL::asset('images/hand.svg'); }}"
              alt=""> </p>
          <p class="custom-font-size-13">Manage all your portfolio on the BuySmallsmall platform</p>
        </div>
        <!-- Sub menu starts here -->
        <div class="container-fluid pl-0 d-flex nav-bottom-color sub-menu my-4">
          <div class="sub-nav d-flex flex-wrap">
            <a class="text-decoration-none secondary-text-color mr-4 py-3  sub-menu--dashboard-active"
              href="/portfolio">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path
                    d="M7 13.125V14.875M10.5 9.625V14.875M14 6.125V14.875M6.825 18.375H14.175C15.6451 18.375 16.3802 18.375 16.9417 18.0889C17.4356 17.8372 17.8372 17.4356 18.0889 16.9417C18.375 16.3802 18.375 15.6451 18.375 14.175V6.825C18.375 5.35486 18.375 4.61979 18.0889 4.05827C17.8372 3.56435 17.4356 3.16278 16.9417 2.91111C16.3802 2.625 15.6451 2.625 14.175 2.625H6.825C5.35486 2.625 4.61979 2.625 4.05827 2.91111C3.56435 3.16278 3.16278 3.56435 2.91111 4.05827C2.625 4.61979 2.625 5.35486 2.625 6.825V14.175C2.625 15.6451 2.625 16.3802 2.91111 16.9417C3.16278 17.4356 3.56435 17.8372 4.05827 18.0889C4.61979 18.375 5.35486 18.375 6.825 18.375Z"
                    stroke="#222222" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Portfolio Stats</span>
              </div>
            </a>

            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="/portfolio">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                  <path
                    d="M1 11.438L11.1243 16.5002C11.2621 16.5691 11.331 16.6035 11.4032 16.6171C11.4672 16.6291 11.5328 16.6291 11.5968 16.6171C11.669 16.6035 11.7379 16.5691 11.8757 16.5002L22 11.438M1 16.688L11.1243 21.7502C11.2621 21.8191 11.331 21.8535 11.4032 21.8671C11.4672 21.8791 11.5328 21.8791 11.5968 21.8671C11.669 21.8535 11.7379 21.8191 11.8757 21.7502L22 16.688M1 6.18803L11.1243 1.12586C11.2621 1.05699 11.331 1.02256 11.4032 1.009C11.4672 0.996999 11.5328 0.996999 11.5968 1.009C11.669 1.02256 11.7379 1.05699 11.8757 1.12586L22 6.18803L11.8757 11.2502C11.7379 11.3191 11.669 11.3535 11.5968 11.3671C11.5328 11.3791 11.4672 11.3791 11.4032 11.3671C11.331 11.3535 11.2621 11.3191 11.1243 11.2502L1 6.18803Z"
                    stroke="#A6A299" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Portfolio</span>
                <span class="portfolio-number ml-2">{{$proptyCount}}</span>
              </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="/receivables">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path
                    d="M14.875 16.5153C16.7312 15.163 17.9375 12.9724 17.9375 10.5C17.9375 6.39241 14.6076 3.06252 10.5 3.06252H10.0625M10.5 17.9375C6.39238 17.9375 3.0625 14.6076 3.0625 10.5C3.0625 8.02768 4.26883 5.83709 6.125 4.48475M9.625 19.6L11.375 17.85L9.625 16.1M11.375 4.90002L9.625 3.15002L11.375 1.40002"
                    stroke="#A6A299" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Receivables</span>
              </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="/addProject">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path
                    d="M10.5 7V14M7 10.5H14M6.825 18.375H14.175C15.6451 18.375 16.3802 18.375 16.9417 18.0889C17.4356 17.8372 17.8372 17.4356 18.0889 16.9417C18.375 16.3802 18.375 15.6451 18.375 14.175V6.825C18.375 5.35486 18.375 4.61979 18.0889 4.05827C17.8372 3.56435 17.4356 3.16278 16.9417 2.91111C16.3802 2.625 15.6451 2.625 14.175 2.625H6.825C5.35486 2.625 4.61979 2.625 4.05827 2.91111C3.56435 3.16278 3.16278 3.56435 2.91111 4.05827C2.625 4.61979 2.625 5.35486 2.625 6.825V14.175C2.625 15.6451 2.625 16.3802 2.91111 16.9417C3.16278 17.4356 3.56435 17.8372 4.05827 18.0889C4.61979 18.375 5.35486 18.375 6.825 18.375Z"
                    stroke="#A6A299" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Add Project</span>
              </div>
            </a>
          </div>
        </div>

        <div class="row my-4" id="addProject1" style = "display: block;">
          <div class="col-12 my-3">
            <p class="font-weight-bold">Project details</p>
          </div>
          <div class="col-12">
            <form class="form-row" id = "frm_projct" class="d-none">
              @csrf
              <div class="row">
                <!-- 1st column of the form -->
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <input type="text" class="form-control input-custom" placeholder="Project name" id="name" name = "name">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <select id="inputState" class="form-control input-custom">
                        <option selected>Pick state</option>
                        @foreach($states as $state)
                        <option>{{$state->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <select id="inputCity" class="form-control input-custom">
                        <option selected>Pick city</option>
                        @foreach($cities as $city)
                        <option>{{$city->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-custom" id="address" rows="3"> Address</textarea>
                  </div>

                  <div class="mb-4">
                    <p class="mb-3" style="text-decoration: underline;">Facilities</p>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="swimming" value="option1">
                      <label class="form-check-label custom-font-size-14" for="swimming">Swiming pool</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="gym" value="option2">
                      <label class="form-check-label custom-font-size-14" for="gym">Gym</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="others" value="option3">
                      <label class="form-check-label custom-font-size-14" for="others">Others</label>
                    </div>
                  </div>

                  <div>
                    <p class="mb-3" style="text-decoration: underline;">Services</p>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="fullyService" value="option1">
                      <label class="form-check-label custom-font-size-14" for="fullyService">Fully serviced</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="partiallyService" value="option2">
                      <label class="form-check-label custom-font-size-14" for="partiallyService">Partially
                        serviced</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="selfService" value="option3">
                      <label class="form-check-label custom-font-size-14" for="selfService">Self serviced</label>
                    </div>
                  </div>
                </div>

                <!-- 2nd column of the form -->
                <div class="col-md-6 col-12 mt-md-0 mt-4">
                  <div class="form-group">
                    <input type="number" class="form-control input-custom" placeholder="Number of Units" id = "unitNumber" name = "unitNumber">
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label class="mb-0">Start date</label>
                      <input type="date" class="form-control" placeholder="First name" id="startDate">
                    </div>
                    <div class="col">
                      <label class="mb-0">Delivery date</label>
                      <input type="date" class="form-control" placeholder="Last name" id="deliveryDate">
                    </div>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-custom" id="currentStage">
                      <option selected value="1">Completed</option>
                      <option value="3">Ongoing Completed within 3 months</option>
                      <option value="6">Ongoing Completed within 6 months</option>
                      <option value="12">Ongoing Completed within 12 months</option>
                      <option value="13">Ongoing Completed above 12 months</option>
                      <option value="0">Yet to break ground</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control input-custom" placeholder="Land Title" id ="landTitle">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control input-custom" placeholder="Approvals" id = "approvals">
                  </div>

                  <div class="col-12 pb-3" id="err" style = "color: red"></div>

                </div>
              </div>

            
          </div>

        </div>
        <div class="row">
          <div class="col-12">
    
          </div>
        </div>

        </form>

        <div class="mt-md-5 mt-2 d-flex justify-content-end" id="nextUnit">
            <a class="btn primary-background" href="#" onclick = "login()">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>&nbsp;&nbsp;Next: Add Type of unit
            </a>
        </div>

        <div class="row my-4" id="addProject2" style="display:none;">
          <div class="col-12 my-3">
            <p class="font-weight-bold">Unit details</p>
          </div>
          <div class="col-12">
            <form>
              @csrf
              <div class="row">
                <!-- 1st column of the form -->
                <div class="col-md-6 col-12">
                  <div class="form-group ">
                    <select id="propty" class="form-control input-custom">
                      <option selected>Property</option>
                      <option value = 'studio'>Studio</option>
                      <option value = '1bed'>1 bedroom</option>
                      <option value = '2bed'>2 bedroom</option>
                      <option value = '3bed'>3 bedroom</option>
                      <option value = '4bed'>4 bedroom</option>
                    </select>
                  </div>
                  <div class="form-group ">
                    <select id="proptyType" class="form-control input-custom">
                      <option selected>Type of property</option>
                      <option value = 'Flat'>Flat</option>
                      <option value = 'Maisonette'>Maisonette</option>
                      <option value = 'Terrace'>Terrace</option>
                      <option value = 'SemiDetached'>Semi-detached duplex</option>
                      <option value = 'fullyDetached'>fully-detached duplex</option>
                      <option value = 'PenthouseLoft'>Penthouse Loft</option>
                      <option value = 'Bungalow'>Bungalow</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control input-custom" id="unitsNumber" placeholder="Unit Number">
                  </div>
                  <div class="form-group">
                    <input type="number" id = "size" class="form-control input-custom" placeholder="Size (sqm)">
                  </div>
                  <div class="mb-4">
                    <p class="mb-3">Features</p>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="oven" value="option1">
                      <label class="form-check-label custom-font-size-14" for="oven">Oven</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="gasHob" value="option2">
                      <label class="form-check-label custom-font-size-14" for="gasHob">Gas hob</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="microwave" value="option3">
                      <label class="form-check-label custom-font-size-14" for="microwave">Microwave</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="ac" value="option3">
                      <label class="form-check-label custom-font-size-14" for="ac">AC</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="washingMachine" value="option3">
                      <label class="form-check-label custom-font-size-14" for="washingMachine">Washing machine</label>
                    </div>
                  </div>


                  <div class="form-group">
                    <textarea class="form-control input-custom" id="textarea2" rows="3"></textarea>
                  </div>

                  <div class="col-12 pb-3" id="err" style = "color: red"></div>
                </div>

                <!-- 2nd column of the form -->
                <div class="col-md-6 col-12 mt-md-0 mt-4">
                  <div class="form-group row">
                    <div class="col">
                      <input type="number" class="form-control" id = "selPrice" placeholder="Selling price">
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" id = "bssSelPrice" placeholder="BSS Special price">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-custom" id = "textarea3" id="exampleFormControlTextarea1"
                      rows="3">More details ( optional )</textarea>
                  </div>
                  <div class="my-dropzone">
                    <div class="form-group">
                      <input type="file" class="form-control ">
                    </div>
                  </div>

                </div>

                <div class="col-md-8 col-12 d-flex mt-5 justify-content-between">
                  <a href="add-project1.html" class="btn  default-border-radius" type="button"
                    style="border: 2px solid #662D91;">back</a>
                  <button onclick="newProject()" class="btn primary-background default-border-radius" style="width: 70%"
                    type="button"> Upload Project</button>
                </div>

              </div>

            </form>
          </div>

        </div>

        <div class="col-12 mx-0" id="new-unit"></div>

        <div class="col-12 my-5" id="addNew" style = "display: none;">
          <button class="btn primary-background default-border-radius" id="add-unit-btn" type="button"> <svg
              xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg> Add another unit type</button>
        </div>
        
      </div>
    </div>

    <!-- <button type="button" id = "modalSuccess" class="btn btn-danger d-none" data-toggle="modal" data-target="#success" >Test success</button>
      <div class="modal fade schedule-visit-modal" id="success" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="row my-4">
          <div class=" col-12 my-3 d-flex justify-content-center">
            <div class="default-background p-5  d-flex flex-column justify-content-center align-items-center">
              <p class="custom-font-size-30  font-weight-bold my-3">Project Uploaded Successful</p>
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <path
                  d="M15.6253 25L21.8753 31.25L34.3753 18.75M45.8337 25C45.8337 36.506 36.5063 45.8334 25.0003 45.8334C13.4944 45.8334 4.16699 36.506 4.16699 25C4.16699 13.4941 13.4944 4.16669 25.0003 4.16669C36.5063 4.16669 45.8337 13.4941 45.8337 25Z"
                  stroke="#662D91" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
              </svg>

              </div>



              <button type="button" class="close" data-dismiss = "modal" aria-label="close">

          </div>
          <!-- <div class="col-12 d-flex my-3 justify-content-center" onclick="addNew()">
            <a class="btn primary-background">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>&nbsp;&nbsp;Add more Project
            </a>
          </div> -->

          <!-- </div>    
        </div> -->

        <button type="button" id = "modalSuccess" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal">
          Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row my-4">
              <div class=" col-12 my-3 d-flex justify-content-center">
                <div class="default-background p-5  d-flex flex-column justify-content-center align-items-center">
                  <p style="font-size: 20px; color:green" class="  font-weight-bold my-3 text-center" >Project Uploaded Successful</p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                    <path
                      d="M15.6253 25L21.8753 31.25L34.3753 18.75M45.8337 25C45.8337 36.506 36.5063 45.8334 25.0003 45.8334C13.4944 45.8334 4.16699 36.506 4.16699 25C4.16699 13.4941 13.4944 4.16669 25.0003 4.16669C36.5063 4.16669 45.8337 13.4941 45.8337 25Z"
                      stroke="#662D91" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>

                  </div>

              </div>
            </div>
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

  <script>
    $(document).ready(function () {

      //Add new another unit type
      const newUnit = `
            <div class="row new-unit-form" id="addProject3">
                <div class="d-flex col-12 py-3 justify-content-end text-danger">
                  <i class="fa-solid fa-circle-xmark" style="cursor: pointer;" id="closeContact"></i>
                </div>

                <!-- 1st column of the form -->
                <div class="col-md-6 col-12">
                  <div class="form-group ">
                      <select id="proptys" class="form-control input-custom">
                      <option selected>Property</option>
                      <option value = 'studio'>Studio</option>
                      <option value = '1bed'>1 bedroom</option>
                      <option value = '2bed'>2 bedroom</option>
                      <option value = '3bed'>3 bedroom</option>
                      <option value = '4bed'>4 bedroom</option>
                      </select>
                  </div>
                  <div class="form-group ">
                    <select id="proptyTypes" class="form-control input-custom">
                    <option selected>Type of property</option>
                      <option value = 'Flat'>Flat</option>
                      <option value = 'Maisonette'>Maisonette</option>
                      <option value = 'Terrace'>Terrace</option>
                      <option value = 'SemiDetached'>Semi-detached duplex</option>
                      <option value = 'fullyDetached'>fully-detached duplex</option>
                      <option value = 'PenthouseLoft'>Penthouse Loft</option>
                      <option value = 'Bungalow'>Bungalow</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control input-custom" id="unitNumbers" placeholder="Unit Number">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control input-custom" id="sizes" placeholder="Size (sqm)">
                  </div>

                  <div class="mb-4">
                    <p class="mb-3">Features</p>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="ovens" value="option1">
                      <label class="form-check-label custom-font-size-14" for="oven">Oven</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="gasHobs" value="option2">
                      <label class="form-check-label custom-font-size-14" for="gas-hob">Gas hob</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="microwaves" value="option3">
                      <label class="form-check-label custom-font-size-14" for="microwave">Microwave</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="acs" value="option3">
                      <label class="form-check-label custom-font-size-14" for="AC">AC</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="washingMachines" value="option3">
                      <label class="form-check-label custom-font-size-14" for="washingMachine">Washing machine</label>
                    </div>
                  </div>


                  <div class="form-group">
                    <textarea class="form-control input-custom" id="textareas2" rows="3"></textarea>
                  </div>

                </div>

                <!-- 2nd column of the form -->
                <div class="col-md-6 col-12 mt-md-0 mt-4">
                  <div class="form-group row">
                    <div class="col">
                      <input type="number" class="form-control" id = "selPrices" placeholder="Selling price">
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" id = "bssSelPrices" placeholder="BSS Special price">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-custom" id = "textareas3"
                      rows="3">More details ( optional )</textarea>
                  </div>
                  <div class="my-dropzone">
                    <div class="form-group">
                      <input type="file" class="form-control ">
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-12 d-flex mt-5 justify-content-between">
                <a href="add-project1.html" class="btn  default-border-radius" type="button"
                  style="border: 2px solid #662D91;">back</a>
                <button onclick="newProjects()" class="btn primary-background default-border-radius" style="width: 70%"
                  type="button"> Upload Project</button>
                </div>
              </div>  
        `;

      // create a new form
      $("#add-unit-btn").click(function () {
        $("#new-unit").append(newUnit);
        document.getElementById("addNew").style.display="none";
      });


      // close the new contact form
      $(document).on('click', '#closeContact', function (e) {
        $("#closeContact").parents(".new-unit-form ").remove();
      });

    });

  </script>


  <script>
    //var unitNumbers = $('#unitNumber').val();

    function login()
    {
        if($('#name').val() == "")
        {
            $('#name').addClass('has-error');
            $("#err").html("Name field cannot be empty");
            return false;
        }

        else if($('#inputState').val() == "")
        {
            $('#inputState').addClass('has-error');
            $("#err").html("State field cannot be empty");
            return false;
        }

        else if($('#inputCity').val() == "")
        {
            $('#inputCity').addClass('has-error');
            $("#err").html("City field cannot be empty");
            return false;
        }

        else if($('#address').val() == "")
        {
            $('#address').addClass('has-error');
            $("#err").html("Address field cannot be empty");
            return false;
        }

        else if($('#unitNumber').val() == "")
        {
            $('#unitNumber').addClass('has-error');
            $("#err").html("unit Number field cannot be empty");
            return false;
        }

        else if($('#startDate').val() == "")
        {
            $('#startDate').addClass('has-error');
            $("#err").html("start Date field cannot be empty");
            return false;
        }

        else if($('#deliveryDate').val() == "")
        {
            $('#deliveryDate').addClass('has-error');
            $("#err").html("delivery Date field cannot be empty");
            return false;
        }

        else if($('#currentStage').val() == "")
        {
            $('#currentStage').addClass('has-error');
            $("#err").html("current Stage field cannot be empty");
            return false;
        }

        else if($('#landTitle').val() == "")
        {
            $('#landTitle').addClass('has-error');
            $("#err").html("land Title field cannot be empty");
            return false;
        }

        else if($('#approvals').val() == "")
        {
            $('#approvals').addClass('has-error');
            $("#err").html("Approvals field cannot be empty");
            return false;
        }

        else
        {
            //var data = $("#frm_login").serialize();

            //alert(data);

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            var name = document.getElementById('name').value;

            var state = document.getElementById('inputState').value;

            var city =  document.getElementById('inputCity').value;

            var address = document.getElementById('address').value;

            var swimming = $('#swimming').is(':checked');

            var gym = $('#gym').is(':checked');

            var others = $('#others').is(':checked');

            var fullyServiced = $('#fullyService').is(':checked');

            var partialServiced = $('#partiallyService').is(':checked');

            var selfServiced = $('#selfService').is(':checked');

            var unitNumber = document.getElementById('unitNumber').value;

            var startDate = document.getElementById('startDate').value;

            var deliveryDate = document.getElementById('deliveryDate').value;

            var currStage = document.getElementById('currentStage').value;

            var landTitle = document.getElementById('landTitle').value;

            var approvals = document.getElementById('approvals').value;
                
            console.log(name);
            console.log(state);
            console.log(city);
            console.log(address);
            console.log(swimming);
            console.log(gym);
            console.log(others);
            console.log(fullyServiced);
            console.log(partialServiced);
            console.log(selfServiced);
            console.log(unitNumber);
            console.log(startDate);
            console.log(deliveryDate);
            console.log(currStage);
            console.log(landTitle);
            console.log(approvals);

            if(gym === false)
            {
              gym = 'no'
            }

            else
            {
              gym = 'yes'
            }

            if(swimming === false)
            {
              swimming = 'no'
            }

            else
            {
              swimming = 'yes'
            }

            if(others === false)
            {
              others = 'no'
            }

            else
            {
              others = 'yes'
            }

            var data = {"name" : name, "state" : state, "city" : city, "address" : address, "swimming" : swimming, "gym" : gym, "others" : others, "fullyServiced" : fullyServiced, "partialServiced" : partialServiced, "selfServiced" : selfServiced, "unitNumber" : unitNumber, "startDate" : startDate, "deliveryDate" : deliveryDate, "currStage" : currStage, "landTitle" : landTitle, "approvals" : approvals, _token: '{{csrf_token()}}'};

            //console.log(data);

            
            $.ajax({
              
              url : '/addProjects',

              type: "POST",

              async: true,

              data: data,

              success	: function (response){
                  
                  if(response == 1)
                  {
                    document.getElementById("addProject1").style.display="none";
                    document.getElementById("addProject2").style.display="block";
                    document.getElementById("addNew").style.display="none";
                    document.getElementById("nextUnit").style.display="none";
                  }

                  else if(response == 2)
                  {
                    alert('something went wrong with the upload');
                  }
                  console.log(response);
                  //window.location.href= data
              }
          });
        }
    }

    function newProject()
    {
        if($('#selPrice').val() == "")
        {
            $('#name').addClass('has-error');
            $("#err").html("Selling Price field cannot be empty");
            return false;
        }

        else if($('#bssSelPrice').val() == "")
        {
            $('#ibssSelPrice').addClass('has-error');
            $("#err").html("BSS special price field cannot be empty");
            return false;
        }

        else
        {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            var property = document.getElementById('propty').value;

            var proptyType = document.getElementById('proptyType').value;

            var unitNumber =  document.getElementById('unitsNumber').value;

            var size = document.getElementById('size').value;

            var oven = $('#oven').is(':checked');

            var gasHob = $('#gasHob').is(':checked');

            var microwave = $('#microwave').is(':checked');

            var ac = $('#ac').is(':checked');

            var washingMachine = $('#washingMachine').is(':checked');

            var textarea2 = document.getElementById('textarea2').value;

            var textarea3 = document.getElementById('textarea3').value;

            var selPrice = document.getElementById('selPrice').value;

            var bssSelPrice = document.getElementById('bssSelPrice').value;
   
            console.log(property);
            console.log(proptyType);
            console.log(unitNumber);
            console.log(size);
            console.log(oven);
            console.log(gasHob);
            console.log(microwave);
            console.log(ac);
            console.log(washingMachine);
            console.log(textarea2);
            console.log(textarea3);
            console.log(selPrice);
            console.log(bssSelPrice);

            if(oven === false)
            {
              oven = 'no'
            }

            else
            {
              oven = 'yes'
            }

            if(gasHob === false)
            {
              gasHob = 'no'
            }

            else
            {
              gasHob = 'yes'
            }

            if(microwave === false)
            {
              microwave = 'no'
            }

            else
            {
              microwave = 'yes'
            }

            if(ac === false)
            {
              ac = 'no'
            }

            else
            {
              ac = 'yes'
            }

            if(washingMachine === false)
            {
              washingMachine = 'no'
            }

            else
            {
              washingMachine = 'yes'
            }

            var data = {"property" : property, "proptyType" : proptyType, "unitNumber" : unitNumber, "size" : size, "oven" : oven, "gasHob" : gasHob, "microwave" : microwave, "ac" : ac, "washingMachine" : washingMachine, "textarea2" : textarea2, "textarea3" : textarea3, "selPrice" : selPrice, "bssSelPrice" : bssSelPrice, _token: '{{csrf_token()}}'};

            var link = document.getElementById('modalSuccess');

            $.ajax({
              
              url : '/addProjectType',

              type: "POST",

              async: true,

              data: data,

              success	: function (response){
                  
                  if(response == 1)
                  {
                    document.getElementById("addProject1").style.display="none";
                    document.getElementById("addProject2").style.display="none";
                    document.getElementById("addNew").style.display="block";
                    document.getElementById("nextUnit").style.display="none";
                    link.click();
                    //alert('Project successfully added');
                  }

                  else if(response == 2)
                  {
                    alert('something went wrong with the upload');
                  }
                  console.log(response);
                  //window.location.href= data
              }
          });

        }
    }

    function newProjects()
    {
        if($('#selPrices').val() == "")
        {
            $('#name').addClass('has-error');
            $("#err").html("Selling Price field cannot be empty");
            return false;
        }

        else if($('#bssSelPrices').val() == "")
        {
            $('#ibssSelPrice').addClass('has-error');
            $("#err").html("BSS special price field cannot be empty");
            return false;
        }

        else
        {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            var property = document.getElementById('proptys').value;

            var proptyType = document.getElementById('proptyTypes').value;

            var unitNumber =  document.getElementById('unitNumbers').value;

            var size = document.getElementById('sizes').value;

            var oven = $('#ovens').is(':checked');

            var gasHob = $('#gasHobs').is(':checked');

            var microwave = $('#microwaves').is(':checked');

            var ac = $('#acs').is(':checked');

            var washingMachine = $('#washingMachines').is(':checked');

            var textarea2 = document.getElementById('textareas2').value;

            var textarea3 = document.getElementById('textareas3').value;

            var selPrice = document.getElementById('selPrices').value;

            var bssSelPrice = document.getElementById('bssSelPrices').value;
   
            console.log(property);
            console.log(proptyType);
            console.log(unitNumber);
            console.log(size);
            console.log(oven);
            console.log(gasHob);
            console.log(microwave);
            console.log(ac);
            console.log(washingMachine);
            console.log(textarea2);
            console.log(textarea3);
            console.log(selPrice);
            console.log(bssSelPrice);


            var data = {"property" : property, "proptyType" : proptyType, "unitNumber" : unitNumber, "size" : size, "oven" : oven, "gasHob" : gasHob, "microwave" : microwave, "ac" : ac, "washingMachine" : washingMachine, "textarea2" : textarea2, "textarea3" : textarea3, "selPrice" : selPrice, "bssSelPrice" : bssSelPrice, _token: '{{csrf_token()}}'};

            var link = document.getElementById('modalSuccess');

            $.ajax({
              
              url : '/addProjectTypes',

              type: "POST",

              async: true,

              data: data,

              success	: function (response){
                  
                  if(response == 1)
                  {
                    document.getElementById("addProject1").style.display="none";
                    document.getElementById("addProject2").style.display="none";
                    document.getElementById("addProject3").style.display="none";
                    document.getElementById("addNew").style.display="block";
                    document.getElementById("nextUnit").style.display="none";
                    link.click();
                    //alert('Project successfully added');
                  }

                  else if(response == 2)
                  {
                    alert('something went wrong with the upload');
                  }
                  console.log(response);
                  //window.location.href= data
              }
          });

        }
    }

    </script>


  <!-- <script>
    // $(document).ready(function () {
    const preloader = $("#preloader");
    window.addEventListener("load", function () {
      preloader.css("display", "none");
    });
      // });
  </script> -->
</body>

</html>
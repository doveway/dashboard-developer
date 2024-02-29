<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

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
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ URL::asset('fontawesome/css/fontawesome.css'); }}" rel="stylesheet" />
  <link href="{{ URL::asset('fontawesome/css/brands.css'); }}" rel="stylesheet" />
  <link href="{{ URL::asset('fontawesome/css/solid.css'); }}" rel="stylesheet" />

  <!-- custom CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/custom-css/header.css'); }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/custom-css/footer.css'); }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/custom-css/index.css'); }}" />

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
            <img src="#" alt="">
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
        <div class="row my-4">
          <div class="col-md-4 mb-3 col-12 ">
            <div class="stats-container  py-2 px-3">
              <div class="d-flex justify-content-between my-1">
                <p class="custom-font-size-14">Total Portfolio</p>
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                    <path
                      d="M1 12.9292L12.5707 18.7145C12.7281 18.7932 12.8068 18.8326 12.8894 18.8481C12.9625 18.8618 13.0375 18.8618 13.1106 18.8481C13.1932 18.8326 13.2719 18.7932 13.4293 18.7145L25 12.9292M1 18.9292L12.5707 24.7145C12.7281 24.7932 12.8068 24.8326 12.8894 24.8481C12.9625 24.8618 13.0375 24.8618 13.1106 24.8481C13.1932 24.8326 13.2719 24.7932 13.4293 24.7145L25 18.9292M1 6.92918L12.5707 1.14384C12.7281 1.06513 12.8068 1.02578 12.8894 1.01029C12.9625 0.99657 13.0375 0.99657 13.1106 1.01029C13.1932 1.02578 13.2719 1.06513 13.4293 1.14384L25 6.92918L13.4293 12.7145C13.2719 12.7932 13.1932 12.8326 13.1106 12.8481C13.0375 12.8618 12.9625 12.8618 12.8894 12.8481C12.8068 12.8326 12.7281 12.7932 12.5707 12.7145L1 6.92918Z"
                      stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </p>
              </div>
              <div class="stats-number">{{number_format($proptyCount)}}</div>
              <div class="d-flex justify-content-end">
                <button class="btn primary-background forward-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <path d="M3.54175 8.50002H13.4584M13.4584 8.50002L8.50008 3.54169M13.4584 8.50002L8.50008 13.4584"
                      stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 col-12 ">
            <div class="stats-container  py-2 px-3">
              <div class="d-flex justify-content-between my-1">
                <p class="custom-font-size-14">Unit locked</p>
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                      d="M13 7L11.8845 4.76892C11.5634 4.1268 11.4029 3.80573 11.1634 3.57116C10.9516 3.36373 10.6963 3.20597 10.4161 3.10931C10.0992 3 9.74021 3 9.02229 3H5.2C4.0799 3 3.51984 3 3.09202 3.21799C2.71569 3.40973 2.40973 3.71569 2.21799 4.09202C2 4.51984 2 5.0799 2 6.2V7M2 7H17.2C18.8802 7 19.7202 7 20.362 7.32698C20.9265 7.6146 21.3854 8.07354 21.673 8.63803C22 9.27976 22 10.1198 22 11.8V16.2C22 17.8802 22 18.7202 21.673 19.362C21.3854 19.9265 20.9265 20.3854 20.362 20.673C19.7202 21 18.8802 21 17.2 21H6.8C5.11984 21 4.27976 21 3.63803 20.673C3.07354 20.3854 2.6146 19.9265 2.32698 19.362C2 18.7202 2 17.8802 2 16.2V7ZM10.1 17.5H13.9C14.4601 17.5 14.7401 17.5 14.954 17.391C15.1422 17.2951 15.2951 17.1422 15.391 16.954C15.5 16.7401 15.5 16.4601 15.5 15.9V15.1C15.5 14.5399 15.5 14.2599 15.391 14.046C15.2951 13.8578 15.1422 13.7049 14.954 13.609C14.7401 13.5 14.4601 13.5 13.9 13.5H10.1C9.53995 13.5 9.25992 13.5 9.04601 13.609C8.85785 13.7049 8.70487 13.8578 8.60899 14.046C8.5 14.2599 8.5 14.5399 8.5 15.1V15.9C8.5 16.4601 8.5 16.7401 8.60899 16.954C8.70487 17.1422 8.85785 17.2951 9.04601 17.391C9.25992 17.5 9.53995 17.5 10.1 17.5ZM13.75 13.5V11.75C13.75 10.7835 12.9665 10 12 10C11.0335 10 10.25 10.7835 10.25 11.75V13.5H13.75Z"
                      stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </p>
              </div>
              <div class="stats-number">{{number_format($totalLocked)}}</div>
              <div class="d-flex justify-content-end">
                <button class="btn primary-background forward-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <path d="M3.54175 8.50002H13.4584M13.4584 8.50002L8.50008 3.54169M13.4584 8.50002L8.50008 13.4584"
                      stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 col-12 ">
            <div class="stats-container  py-2 px-3">
              <div class="d-flex justify-content-between my-1">
                <p class="custom-font-size-14">Receivbles</p>
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 7H14C17.3137 7 20 9.68629 20 13C20 16.3137 17.3137 19 14 19H4M4 7L8 3M4 7L8 11"
                      stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </p>
              </div>
              <div class="stats-number">&#8358;{{number_format($totalReceivable)}}</div>
              <div class="d-flex justify-content-end">
                <button class="btn primary-background forward-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <path d="M3.54175 8.50002H13.4584M13.4584 8.50002L8.50008 3.54169M13.4584 8.50002L8.50008 13.4584"
                      stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 col-12 ">
            <div class="stats-container  py-2 px-3">
              <div class="d-flex justify-content-between my-1">
                <p class="custom-font-size-14">Total Payout</p>
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 7H10C6.68629 7 4 9.68629 4 13C4 16.3137 6.68629 19 10 19H20M20 7L16 3M20 7L16 11"
                      stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </p>
              </div>
              <div class="stats-number">&#8358;{{number_format($totalPayout)}}</div>
              <div class="d-flex justify-content-end">
                <button class="btn primary-background forward-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <path d="M3.54175 8.50002H13.4584M13.4584 8.50002L8.50008 3.54169M13.4584 8.50002L8.50008 13.4584"
                      stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 col-12 ">
            <div class="stats-container  py-2 px-3">
              <div class="d-flex justify-content-between my-1">
                <p class="custom-font-size-14">Outstanding Receivables</p>
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M14 10L21 3M21 3H15M21 3V9M10 14L3 21M3 21H9M3 21L3 15" stroke="#222222" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </p>
              </div>
              <div class="stats-number">&#8358;{{number_format($outstndngReceivables)}}</div>
              <div class="d-flex justify-content-end">
                <button class="btn primary-background forward-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <path d="M3.54175 8.50002H13.4584M13.4584 8.50002L8.50008 3.54169M13.4584 8.50002L8.50008 13.4584"
                      stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
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
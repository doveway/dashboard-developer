<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Favicon link -->
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/images/bss-favicon.png'); }}" />

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
  <link rel="stylesheet" href="{{ URL::asset('css/custom-css/portfolio.css'); }}" />

  <!-- DropZone library for drag and drop -->
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

  <title>Portfolio - uploaded </title>
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
      <!-- side-bar start here -->
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
              <a href="/addProject" class="btn primary-background default-border-radius" type="button"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg> Add Project</a>
            </div>

            <div class="divider mt-5 mb-3"></div>
            <div class="text-center">
              <p style="font-size: 12px">Contact Support</p>
              <p class="custom-font-size-13">hello@buysmallsmall.ng</p>
            </div>
          </div>
        </div>
      </div>

      <!-- main body starts here -->
      <div class="col-md-8  col-12">
        <div class="my-md-0 my-4">
          <p style="font-weight: 600; font-size: 20px;">Welcome, {{$developerName}} <img src="{{ URL::asset('images/hand.svg'); }}" alt=""> </p>
          <p class="custom-font-size-13">Manage all your portfolio on the BuySmallsmall platform</p>
        </div>
        <!-- Sub menu starts here -->
        <div class="container-fluid pl-0 d-flex nav-bottom-color sub-menu my-4">
          <div class="sub-nav d-flex flex-wrap">
            <a class="text-decoration-none secondary-text-color mr-4 py-3  " href="/portfolio">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path d="M7 13.125V14.875M10.5 9.625V14.875M14 6.125V14.875M6.825 18.375H14.175C15.6451 18.375 16.3802 18.375 16.9417 18.0889C17.4356 17.8372 17.8372 17.4356 18.0889 16.9417C18.375 16.3802 18.375 15.6451 18.375 14.175V6.825C18.375 5.35486 18.375 4.61979 18.0889 4.05827C17.8372 3.56435 17.4356 3.16278 16.9417 2.91111C16.3802 2.625 15.6451 2.625 14.175 2.625H6.825C5.35486 2.625 4.61979 2.625 4.05827 2.91111C3.56435 3.16278 3.16278 3.56435 2.91111 4.05827C2.625 4.61979 2.625 5.35486 2.625 6.825V14.175C2.625 15.6451 2.625 16.3802 2.91111 16.9417C3.16278 17.4356 3.56435 17.8372 4.05827 18.0889C4.61979 18.375 5.35486 18.375 6.825 18.375Z" stroke="#A6A299" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Portfolio Stats</span>
              </div>
            </a>

            <a class="text-decoration-none secondary-text-color mr-4 py-3 sub-menu--dashboard-active" href="/portfolio">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                  <path d="M1 11.438L11.1243 16.5002C11.2621 16.5691 11.331 16.6035 11.4032 16.6171C11.4672 16.6291 11.5328 16.6291 11.5968 16.6171C11.669 16.6035 11.7379 16.5691 11.8757 16.5002L22 11.438M1 16.688L11.1243 21.7502C11.2621 21.8191 11.331 21.8535 11.4032 21.8671C11.4672 21.8791 11.5328 21.8791 11.5968 21.8671C11.669 21.8535 11.7379 21.8191 11.8757 21.7502L22 16.688M1 6.18803L11.1243 1.12586C11.2621 1.05699 11.331 1.02256 11.4032 1.009C11.4672 0.996999 11.5328 0.996999 11.5968 1.009C11.669 1.02256 11.7379 1.05699 11.8757 1.12586L22 6.18803L11.8757 11.2502C11.7379 11.3191 11.669 11.3535 11.5968 11.3671C11.5328 11.3791 11.4672 11.3791 11.4032 11.3671C11.331 11.3535 11.2621 11.3191 11.1243 11.2502L1 6.18803Z" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Portfolio</span>
                <span class="portfolio-number-active ml-2 ">{{$proptyCount}}</span>
              </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="/receivables">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path d="M14.875 16.5153C16.7312 15.163 17.9375 12.9724 17.9375 10.5C17.9375 6.39241 14.6076 3.06252 10.5 3.06252H10.0625M10.5 17.9375C6.39238 17.9375 3.0625 14.6076 3.0625 10.5C3.0625 8.02768 4.26883 5.83709 6.125 4.48475M9.625 19.6L11.375 17.85L9.625 16.1M11.375 4.90002L9.625 3.15002L11.375 1.40002" stroke="#A6A299" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Receivables</span>
              </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3 " href="/addProject">
              <div class="sub-menu-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path d="M10.5 7V14M7 10.5H14M6.825 18.375H14.175C15.6451 18.375 16.3802 18.375 16.9417 18.0889C17.4356 17.8372 17.8372 17.4356 18.0889 16.9417C18.375 16.3802 18.375 15.6451 18.375 14.175V6.825C18.375 5.35486 18.375 4.61979 18.0889 4.05827C17.8372 3.56435 17.4356 3.16278 16.9417 2.91111C16.3802 2.625 15.6451 2.625 14.175 2.625H6.825C5.35486 2.625 4.61979 2.625 4.05827 2.91111C3.56435 3.16278 3.16278 3.56435 2.91111 4.05827C2.625 4.61979 2.625 5.35486 2.625 6.825V14.175C2.625 15.6451 2.625 16.3802 2.91111 16.9417C3.16278 17.4356 3.56435 17.8372 4.05827 18.0889C4.61979 18.375 5.35486 18.375 6.825 18.375Z" stroke="#A6A299" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="pl-2">Add Project</span>
              </div>
            </a>
          </div>
        </div>

        <div class="row my-4">

          <div class="col-12">
            <nav class="nav">
              <li class="nav-item mr-3 ">
                <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="uploadedPortfolioBtn" href="#" role="button">Uploaded Portfolio</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link secondary-text-color px-0 " id="shareCertificateBtn" href="#" role="button">Live
                  Portfolio</a>
              </li>
            </nav>
          </div>

          <!-- Uploaded Portfolio -->
          <div class="col-12 mt-5 collapse show" id="uploadedPortfolio">

            <div class="row">

              @foreach($totResults as $totResult)
              <div class="col-12 col-md-6">
                <div class="portfolio-container p-3">

                  <div class="d-flex justify-content-between">
                    <div class="project-details d-flex justify-content-center">
                      <img src="{{ URL::asset('images/project-img.jpeg'); }}" alt="" style="width: 40px; height: 40px" class="rounded-circle">
                      <div class="ml-2">
                        <p class="custom-font-size-12">Project name</p>
                        <p class="font-weight-bold">{{$totResult->project_name}}</p>
                      </div>
                    </div>
                    <div class="dropdown">
                      <button class="action-icon" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                          <path d="M15.5697 12.7753C15.5697 13.328 15.4058 13.8683 15.0987 14.3279C14.7916 14.7875 14.3552 15.1457 13.8445 15.3572C13.3339 15.5687 12.772 15.624 12.2299 15.5162C11.6878 15.4084 11.1898 15.1422 10.799 14.7514C10.4082 14.3605 10.142 13.8626 10.0342 13.3205C9.92634 12.7784 9.98168 12.2165 10.1932 11.7059C10.4047 11.1952 10.7629 10.7588 11.2225 10.4517C11.682 10.1446 12.2223 9.98071 12.7751 9.98071C13.5162 9.98071 14.2271 10.2751 14.7511 10.7992C15.2752 11.3233 15.5697 12.0341 15.5697 12.7753ZM12.7751 7.58534C13.3278 7.58534 13.8681 7.42144 14.3277 7.11437C14.7872 6.80729 15.1454 6.37084 15.3569 5.86019C15.5684 5.34955 15.6238 4.78765 15.516 4.24555C15.4081 3.70345 15.142 3.2055 14.7511 2.81467C14.3603 2.42384 13.8624 2.15768 13.3203 2.04985C12.7782 1.94202 12.2163 1.99737 11.7056 2.20888C11.195 2.4204 10.7585 2.77859 10.4514 3.23816C10.1444 3.69773 9.98047 4.23803 9.98047 4.79075C9.98047 5.53192 10.2749 6.24274 10.799 6.76682C11.3231 7.29091 12.0339 7.58534 12.7751 7.58534ZM12.7751 17.9653C12.2223 17.9653 11.682 18.1292 11.2225 18.4362C10.7629 18.7433 10.4047 19.1798 10.1932 19.6904C9.98168 20.2011 9.92634 20.763 10.0342 21.305C10.142 21.8471 10.4082 22.3451 10.799 22.7359C11.1898 23.1268 11.6878 23.3929 12.2299 23.5007C12.772 23.6086 13.3339 23.5532 13.8445 23.3417C14.3552 23.1302 14.7916 22.772 15.0987 22.3124C15.4058 21.8529 15.5697 21.3126 15.5697 20.7599C15.5697 20.0187 15.2752 19.3079 14.7511 18.7838C14.2271 18.2597 13.5162 17.9653 12.7751 17.9653Z" fill="#A8A8BD" />
                        </svg>
                      </button>
                      <div class="dropdown-menu custom-dropdown">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="/portfolioDetail/{{$totResult->project_id}}">View</a>
                      </div>
                    </div>

                  </div>

                  <div class="mx-3">
                    <div class="divider-2 my-2"></div>
                    <div class="d-flex flex-wrap">
                      <div class="mr-3 my-2">
                        <p class="custom-font-size-12">Location</p>
                        <p class="custom-font-size-14" style="font-weight: 600;">{{$totResult->city}}</p>
                      </div>
                      <div class="mr-3 my-2">
                        <p class="custom-font-size-12">Number of Units</p>
                        <p class="custom-font-size-14" style="font-weight: 600;">{{$totResult->unitNumber}}</p>
                      </div>
                      <div class="mr-3 my-2">
                        <p class="custom-font-size-12">Type of Units</p>
                        <p class="custom-font-size-14" style="font-weight: 600;">{{$totResult->proptyType}}</p>
                      </div>
                      <div class="mr-3 my-2">
                        <p class="custom-font-size-12">Size</p>
                        <p class="custom-font-size-14" style="font-weight: 600;">{{$totResult->size}}</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-6"></div>
              <div class="col-6"></div>
              @endforeach
            </div>

          </div>

          <!-- Live Portfolio -->
          <div class="col-12 mt-5 collapse" id="shareCertificate">
            <div class="row">
              <?php $Locked = 0;
              $sold = 0;

              $developerId = session()->get('developerID');

              $sql = "SELECT a.* FROM developer_property as a WHERE a.developer_id = '$developerId'";

              $totalResults = DB::select($sql);

              foreach ($totalResults as $totalResult) {
                $unit = $totalResult->unit_number;
                $parent_id = $totalResult->project_id;

                $sql = "SELECT a.* FROM buytolet_property as a WHERE a.parent_id = '$parent_id'";

                $totlResults = DB::select($sql);

                foreach ($totlResults as $totlResult) {
                  if ($totlResult->availability == 'locked') {
                    $Locked += 1;
                  } elseif ($totlResult->availability == 'sold') {
                    $sold += 1;
                  }
                }

                $Available = $unit - $Locked - $sold;

                $sql = "SELECT count(*) as count FROM developer_payout as a WHERE a.property_id = '$parent_id'";

                $customers = DB::select($sql);

                foreach ($customers as $customer) {
                  $customerCount = $customer->count;
                }

                echo '<div class="mb-4 col-12 col-md-4">
                        <div class="portfolio-container p-2">
        
                          <div class="d-flex justify-content-between">
                            <div class="project-details d-flex justify-content-center">
                              <img src="../images/project-img.jpeg " alt="" style="width: 40px; height: 40px"
                                class="rounded-circle">
                              <div class="ml-2">
                                <p class="custom-font-size-12">Project name</p>
                                <p class="font-weight-bold">' . $totalResult->project_name . '</p>
                              </div>
                            </div>
                            <div>
                              <a href="portfolio-detail.html"
                                class="btn primary-background default-border-radius custom-font-size-14 px-3 py-1 ">View</a>
                            </div>
        
                            </div>
                          <div class=" py-3 px-1">

                        <div class=" d-flex py-1 justify-content-between">
                          <p class="custom-font-size-14  font-weight-bold">' . $unit . ' 
                          </p>
                          <p class="custom-font-size-14   font-weight-bold">' . $Locked . ' 
                          </p>
                          <p class="custom-font-size-14   font-weight-bold">' . $Available . '
                          </p>
                          <p class="custom-font-size-14   font-weight-bold">' . $customerCount . ' 
                          </p>
                        </div>
                        <div class="divider-2"></div>
                        <div class="d-flex py-1 justify-content-between">
                          <p class=" custom-font-size-13  ">Units</p>
                          <p class=" custom-font-size-13  ">Locked</p>
                          <p class=" custom-font-size-13  ">Available</p>
                          <p class=" custom-font-size-13  ">Customers</p>
                        </div>
    
                      </div>
    
                    </div>
                  </div>';
              }
              ?>

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
    $(document).ready(function() {

      $("#uploadedPortfolioBtn").click(function() {
        $("#uploadedPortfolio").addClass("show");
        $("#shareCertificate").removeClass("show");
        $("#history").removeClass("show");
        $("#shareCertificateBtn").addClass("secondary-text-color")
        $("#shareCertificateBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#uploadedPortfolioBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#uploadedPortfolioBtn").removeClass("secondary-text-color")

      });
      $("#shareCertificateBtn").click(function() {
        $("#shareCertificate").addClass("show");
        $("#uploadedPortfolio").removeClass("show");
        $("#history").removeClass("show");
        $("#shareCertificateBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#shareCertificateBtn").removeClass("secondary-text-color")
        $("#uploadedPortfolioBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#uploadedPortfolioBtn").addClass("secondary-text-color")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

      });


      //Add new another unit type
      const newUnit = `
            <div class="row new-unit-form" >
                <div class="d-flex col-12 py-3 justify-content-end text-danger">
                  <i class="fa-solid fa-circle-xmark" style="cursor: pointer;" id="closeContact"></i>
                </div>

                <!-- 1st column of the form -->
                <div class="col-md-6 col-12">
                  <div class="form-group ">
                    <select id="inputState" class="form-control input-custom">
                      <option selected>Type of unit</option>
                      <option>...</option>
                    </select>
                  </div>
                  <div class="form-group ">
                    <select id="inputState" class="form-control input-custom">
                      <option selected>Number of unit</option>
                      <option>...</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-custom" placeholder="Size (sqm)">
                  </div>

                  <div class="mb-4">
                    <p class="mb-3">Features</p>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="oven" value="option1">
                      <label class="form-check-label custom-font-size-14" for="oven">Oven</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="gas-hob" value="option2">
                      <label class="form-check-label custom-font-size-14" for="gas-hob">Gas hob</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="microwave" value="option3">
                      <label class="form-check-label custom-font-size-14" for="microwave">Microwave</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="AC" value="option3">
                      <label class="form-check-label custom-font-size-14" for="AC">AC</label>
                    </div>
                    <div class="form-check form-check-inline mr-3">
                      <input class="form-check-input" type="checkbox" id="washing-machine" value="option3">
                      <label class="form-check-label custom-font-size-14" for="washing-machine">Washing machine</label>
                    </div>
                  </div>


                  <div class="form-group">
                    <textarea class="form-control input-custom" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                </div>

                <!-- 2nd column of the form -->
                <div class="col-md-6 col-12 mt-md-0 mt-4">
                  <div class="form-group row">
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Selling price">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="BSS Special price">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-custom" id="exampleFormControlTextarea1"
                      rows="3">More details ( optional )</textarea>
                  </div>
                  <div class="my-dropzone">
                    <div class="form-group">
                      <input type="file" class="form-control ">
                    </div>
                  </div>

                </div>
            </div>  
              
        
        `;

      // create a new form
      $("#add-unit-btn").click(function() {
        $("#new-unit").append(newUnit)
      });


      // close the new contact form
      $(document).on('click', '#closeContact', function(e) {
        $("#closeContact").parents(".new-unit-form ").remove();
      });

    });
  </script>

  <script>
    // Dropzone has been added as a global variable.
    const dropzone = new Dropzone("div.my-dropzone", {
      url: "/file/post"
    });
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
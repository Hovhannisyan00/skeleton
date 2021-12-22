
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @yield('add-css')
    {{--datatable--}}
    <link href="/css/dashboard/datatable.css" rel="stylesheet">
    {{--end datatable--}}

    <link href="{{mix('/css/dashboard/dashboard-app.css')}}" rel="stylesheet">

</head>

<body>

<main class="d-flex page">

    <div class="left-menu">
        {{--    iconner    https://preview.keenthemes.com/metronic/demo1/features/icons/svg.html--}}
        <div class="brand d-flex align-items-center">
            <a href="#" class="brand-logo" aria-label="brand"><img alt="Logo" src="/img/logo.svg"></a>
            <button class="brand-toggle" type="button" aria-label="minimaize menu">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#494b74" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#494b74" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
                    </g>
                </svg>
                </span>
            </button>
        </div>

        <div id="simple-bar" class="simple-bar">
            <ul class="menu-nav" id="menu-nav">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                               <polygon points="0 0 24 0 24 24 0 24"></polygon>
                               <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                               <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                           </g>
                       </svg>
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="menu-item-group">CUSTOM</li>
                <li class="menu-item">
                    <a class="menu-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Applications</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" data-parent="#menu-nav" id="collapseExample">
                        <ul class="menu-nav">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Users</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Profile</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Articles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Datatables</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" data-parent="#menu-nav" id="collapseExample2">
                        <ul class="menu-nav">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Users</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Profile</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Articles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"></rect>
                              <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"></rect>
                              <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"></path>
                          </g>
                      </svg>
                        </span>
                        <span class="menu-text">Pages</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="svg-icon">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                               <rect x="0" y="0" width="24" height="24"></rect>
                               <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                               <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1"></rect>
                               <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero"></path>
                           </g>
                       </svg>
                        </span>
                        <span class="menu-text">File Upload</span>
                    </a>
                </li>

                <li class="menu-item-group">LAYOUT</li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="svg-icon">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                               <rect x="0" y="0" width="24" height="24"></rect>
                               <path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"></path>
                               <path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"></path>
                           </g>
                       </svg>
                   </span>
                        <span class="menu-text">Cards</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="svg-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <rect x="0" y="0" width="24" height="24"></rect>
                             <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                             <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                         </g>
                     </svg>
                   </span>
                        <span class="menu-text">Forms</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="svg-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24"></rect>
                                   <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path>
                                   <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path>
                               </g>
                           </svg>
                        </span>
                        <span class="menu-text">Bootstrap</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" data-parent="#menu-nav" id="collapseExample3">
                        <ul class="menu-nav">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Users</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Profile</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Articles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>


    <div class="wrapper w-100 d-flex flex-column">

        <header class="header">
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="brand-logo d-xl-none">
                    <img src="/img/logo.svg" width="100" alt="Logo">
                </a>
                <a href="#" class="notification-btn ml-auto position-relative dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i>15</i>
                    <span class="svg-icons">
                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 20.635 26.035"><defs><style>.a{fill:currentColor;}</style></defs><g transform="translate(0)"><path class="a" d="M184.9,465.044a3.933,3.933,0,0,0,7.2,0Z" transform="translate(-178.186 -441.358)"/><path class="a" d="M199.3,2.487a8.846,8.846,0,0,1,3.021.529V2.9a2.9,2.9,0,0,0-2.9-2.9h-.24a2.9,2.9,0,0,0-2.9,2.9v.115A8.863,8.863,0,0,1,199.3,2.487Z" transform="translate(-188.98 0)"/><path class="a" d="M72.864,96.979H53.8a.777.777,0,0,1-.766-.6.741.741,0,0,1,.408-.843,4.046,4.046,0,0,0,1.231-1.674,19.34,19.34,0,0,0,1.284-7.653,7.376,7.376,0,0,1,14.752-.029q0,.015,0,.029a19.34,19.34,0,0,0,1.284,7.653,4.045,4.045,0,0,0,1.231,1.674.741.741,0,0,1,.408.843A.777.777,0,0,1,72.864,96.979Zm.367-1.434h0Z" transform="translate(-53.013 -74.821)"/></g>
                       </svg>
                   </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0">

                    <div class="dropdown-notification simple-bar">
                        <a href="#" class="notification-link">
                            <div class="notification-title">
                                New Student Registered
                            </div>
                            <div class="notification-time">
                                1 week ago
                            </div>
                        </a>
                        <a href="#" class="notification-link">
                            <div class="notification-title">
                                New Student Registered (Anna Asatryan)
                            </div>
                            <div class="notification-time">
                                1 week ago
                            </div>
                        </a>
                        <a href="#" class="notification-link">
                            <div class="notification-title">
                                New Student Registered (Anna Asatryan)
                            </div>
                            <div class="notification-time">
                                1 week ago
                            </div>
                        </a>
                        <a href="#" class="notification-link">
                            <div class="notification-title">
                                New Student Registered (Anna Asatryan)
                            </div>
                            <div class="notification-time">
                                1 week ago
                            </div>
                        </a>
                        <a href="#" class="notification-link">
                            <div class="notification-title">
                                New Student Registered (Anna Asatryan)
                            </div>
                            <div class="notification-time">
                                1 week ago
                            </div>
                        </a>
                        <a href="#" class="notification-link">
                            <div class="notification-title">
                                New Student Registered (Anna Asatryan)
                            </div>
                            <div class="notification-time">
                                1 week ago
                            </div>
                        </a>

                    </div>
                    <a href="#" class="notification-link-all">SEE ALL</a>
                </div>

                <div class="btn-group lang-drop">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-label="lang" aria-haspopup="true" aria-expanded="false">
                        <img src="/img/united-states.svg" alt="" width="20px" height="20px">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">
                            <img src="/img/france.svg" alt=""  width="20px" height="20px">
                            <span class="navi-text">French</span>
                        </button>
                        <button class="dropdown-item" type="button">
                            <img src="/img/germany.svg" alt=""  width="20px" height="20px">
                            <span class="navi-text">German</span>
                        </button>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-md-inline-block">AIST Global</span>
                        <span class="flaticon-user ml-2"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">
                            <i class="flaticon2-user-1 mr-2"></i>
                            My Profile
                        </button>
                        <button class="dropdown-item" type="button">
                            <i class="flaticon-logout  mr-2"></i>
                            Log out
                        </button>
                    </div>
                </div>

                <button class="btn open-menu" type="button">
                    <i class="flaticon2-cross"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false">
                        <title>Menu</title>
                        <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                    </svg>
                </button>
            </div>
        </header>

        <div class="content d-flex flex-column flex-column-fluid">

            @yield('content')

            <div class="subheader flex-wrap">
                <div class="subheader-left pt-2 pb-2">
                    <h3 class="subheader-left-title">Authors</h3>
                    <span class="subheader-left-separator"></span>

                    <div class="subheader-breadcrumbs">
                        <a href="#" class="breadcrumbs-link" aria-label="home"><i class="flaticon2-shelter"></i></a>
                        <span class="breadcrumbs-separator-dot"></span>
                        <a href="#" class="breadcrumbs-link">Authors</a>
                        <span class="breadcrumbs-separator-dot"></span>
                        <a href="#" class="breadcrumbs-link">Create New Author</a>
                    </div>
                </div>
                <div class="d-flex ml-auto">
                    <a href="#" class="btn btn-secondary ml-2">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-2">Save</button>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Unit Of Measurements</h3>
                        </div>

                        <div class="ml-auto">
                            <a href="#" class="btn btn-create">
                                <i class="flaticon2-plus mr-2"></i>
                                Create New Group
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" class="form-control" placeholder="First Name" name="first_name" type="text">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" class="form-control" placeholder="Last Name" name="last_name" type="text">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Select 2</label>
                                <select class="js-example-basic-single w-100" name="state" aria-label="select">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Select 2 multiple</label>
                                <select class="js-example-basic-multiple w-100" name="state" aria-label="select" multiple="multiple">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="custom-radio-block mb-2">
                                    <input type="radio" id="radio1" name="aa" class="custom-radio">
                                    <label for="radio1">Custom Radio</label>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="custom-radio-block mb-2">
                                        <input type="radio" id="radio3" name="bb" class="custom-radio">
                                        <label for="radio3">Custom Radio</label>
                                    </div>
                                    <div class="custom-radio-block mb-2">
                                        <input type="radio" id="radio4" name="bb" class="custom-radio">
                                        <label for="radio4">Custom Radio</label>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="custom-checkbox mb-2">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <label for="checkbox1" class="form-check-label">Custom Checkbox</label>
                                    </div>
                                    <div class="custom-checkbox mb-2">
                                        <input type="checkbox" id="checkbox2" class="form-check-input">
                                        <label for="checkbox2" class="form-check-label">Custom Checkbox</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                    </li>
                                </ul>
                                <div class="tab-content p-2" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Tab 1</div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Tab 2</div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Tab 3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Authors</h3>
                        </div>

                        <div class="ml-auto">
                            <a href="#" class="btn btn-create">
                                <i class="flaticon2-plus mr-2"></i>
                                Create New Group
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="d-flex align-items-end justify-content-between flex-wrap">
                            <div class="d-flex align-items-center mb-4 mr-3">
                                <label class="mr-3 mb-0">Status:</label>
                                <select class="form-control" aria-label="Status">
                                    <option value="">All</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Delivered</option>
                                    <option value="3">Canceled</option>
                                    <option value="4">Success</option>
                                    <option value="5">Info</option>
                                    <option value="6">Danger</option>
                                </select>
                            </div>

                            <form action="" class="ml-auto mb-4">
                                <div class="search-block position-relative ml-auto">
                                    <input type="search" placeholder="Search" class="form-control" aria-label="search">
                                    <button type="submit" class="btn">
                                        <i class="flaticon-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>


                        <div class="table-responsive">
                            <table class="table mobile-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th class="text-center" style="width: 90px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-label="ID">29548</td>
                                    <td data-label="Firstname">John</td>
                                    <td data-label="Lastname">Doe</td>
                                    <td data-label="Email">john@example.com</td>
                                    <td data-label="Created At">2020-04-13 07:09:41</td>
                                    <td data-label="Actions"  class="table-buttons">
                                        <div class="text-center table-buttons">
                                            <a href="#" class="btn" title="Edit details">
                                                <i class="flaticon-edit"></i>
                                            </a>
                                            <a href="#" class="btn" title="Delete">
                                                <i class="flaticon2-trash"></i>
                                            </a>
                                            <a href="#" class="btn" title="Show details">
                                                <i class="flaticon-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="ID">29548</td>
                                    <td data-label="Firstname">JohnJohn JohnJohn JohnJohn</td>
                                    <td data-label="Lastname">Doe JohnJohn JohnJohn Doe</td>
                                    <td data-label="Email">john@examplempleexample.com</td>
                                    <td data-label="Created At">	2020-04-13 07:09:41</td>
                                    <td data-label="Actions" class="table-buttons"></td>
                                </tr>
                                <tr>
                                    <td data-label="ID">29548</td>
                                    <td data-label="Firstname">John</td>
                                    <td data-label="Lastname">Doe</td>
                                    <td data-label="Email">john@example.com</td>
                                    <td data-label="Created At">	2020-04-13 07:09:41</td>
                                    <td data-label="Actions" class="table-buttons"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item "><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>

                {{--Datatables--}}
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Datatables</h3>
                        </div>

                        <div class="ml-auto">
                            <a href="#" class="btn btn-create">
                                <i class="flaticon2-plus mr-2"></i>
                                Create New Group
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            {{--https://datatables.net/--}}
                            <table id="table_id" class="display table">
                                <thead>
                                <tr>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                    <th>Column 3</th>
                                    <th>Column 4</th>
                                    <th>Column 5</th>
                                    <th>Column 6</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Row 1 Data 1</td>
                                    <td>Row 1 Data 2</td>
                                    <td>Row 1 Data 3</td>
                                    <td>Row 1 Data 4</td>
                                    <td>Row 1 Data 5</td>
                                    <td>Row 1 Data 6</td>
                                </tr>
                                <tr>
                                    <td>Row 2 Data 1</td>
                                    <td>Row 2 Data 2</td>
                                    <td>Row 2 Data 3</td>
                                    <td>Row 2 Data 4</td>
                                    <td>Row 2 Data 5</td>
                                    <td>Row 2 Data 6</td>
                                </tr>
                                <tr>
                                    <td>Row 2 Data 1</td>
                                    <td>Row 2 Data 2</td>
                                    <td>Row 2 Data 3</td>
                                    <td>Row 2 Data 4</td>
                                    <td>Row 2 Data 5</td>
                                    <td>Row 2 Data 6</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Base Controls</h3>
                            </div>

                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <label for="">Choose Image</label>
                                            <input type="file" class="demo custom-file-img" multiple data-jpreview-container="#demo-1-container">
                                        </div>
                                        <div id="demo-1-container" class="jpreview-container"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>File Browser</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="d-flex align-items-center">
                                            <label for="status">Inactive</label>
                                            <span class="kt-switch kt-switch--icon mr-3 ml-3">
                                                <label>
                                                    <input class="form-input-styled" name="status" type="checkbox" value="1" id="status">
                                                    <span></span>
                                                </label>
                                            </span>
                                            <label for="status">Active</label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" placeholder="Enter email" aria-label="email">
                                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect1">Example select
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="exampleSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">Example multiple select
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select multiple class="form-control" id="exampleSelect2">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="exampleTextarea">Example textarea
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Textual HTML5 Inputs</h3>
                            </div>

                            <form>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-12 col-form-label">Text</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-md-2 col-12 col-form-label">Search</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-md-2 col-12 col-form-label">Email</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-12 col-form-label">URL</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-md-2 col-12 col-form-label">Telephone</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-md-2 col-12 col-form-label">Password</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-md-2 col-12 col-form-label">Number</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="number" value="42" id="example-number-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-datetime-local-input" class="col-md-2 col-12 col-form-label">Date and time</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-md-2 col-12 col-form-label">Date</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-md-2 col-12 col-form-label">Month</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-week-input" class="col-md-2 col-12 col-form-label">Week</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-time-input" class="col-md-2 col-12 col-form-label">Time</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-md-2 col-12 col-form-label">Color</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-md-2 col-12 col-form-label">Range</label>
                                        <div class="col-md-10 col-12">
                                            <input class="form-control" type="range">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <button type="reset" class="btn btn-success mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Solid Background Style</h3>
                            </div>

                            <form class="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Input</label>
                                        <input type="email" class="form-control form-control-solid" placeholder="Example input">
                                    </div>
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control form-control-solid">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Textarea</label>
                                        <textarea class="form-control form-control-solid" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="col-md-6">

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Input States</h3>
                            </div>

                            <form class="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Disabled Input</label>
                                        <input type="email" class="form-control" disabled="disabled" placeholder="Disabled input">
                                    </div>
                                    <div class="form-group">
                                        <label>Disabled select</label>
                                        <select class="form-control" disabled="disabled">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Disabled textarea</label>
                                        <textarea class="form-control" disabled="disabled" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Readonly Input</label>
                                        <input type="email" class="form-control" readonly="readonly" placeholder="Readonly input">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Readonly textarea</label>
                                        <textarea class="form-control" readonly="readonly" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Input Sizing</h3>
                            </div>

                            <form class="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Large Input</label>
                                        <input type="email" class="form-control form-control-lg" placeholder="Large input">
                                    </div>
                                    <div class="form-group">
                                        <label>Default Input</label>
                                        <input type="email" class="form-control" placeholder="Large input">
                                    </div>
                                    <div class="form-group">
                                        <label>Small Input</label>
                                        <input type="email" class="form-control form-control-sm" placeholder="Large input">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectl">Large Select</label>
                                        <select class="form-control form-control-lg" id="exampleSelectl">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd">Default Select</label>
                                        <select class="form-control" id="exampleSelectd">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelects">Small Select</label>
                                        <select class="form-control form-control-sm" id="exampleSelects">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" class="btn btn-success mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Custom Controls</h3>
                            </div>

                            <form class="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">
                                                <span>Toggle this switch element</span>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                            <label class="custom-control-label" for="customSwitch2">
                                                <span>Toggle this switch element</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Custom Range</label>
                                        <div></div>
                                        <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                                    </div>
                                    <div class="form-group">
                                        <label>Custom Select</label>
                                        <div></div>
                                        <select class="custom-select form-control">
                                            <option selected="selected">Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                                <div class="card-footer">
                                    <p>
                                        <button type="button" class="btn btn-primary mr-2">Primary</button>
                                        <button type="button" class="btn btn-secondary mr-2">Secondary</button>
                                        <button type="button" class="btn btn-success mr-2">Success</button>
                                        <button type="button" class="btn btn-danger mr-2">Danger</button>
                                        <button type="button" class="btn btn-warning mr-2">Warning</button>
                                    </p>
                                    <p>
                                        <button type="button" class="btn btn-info mr-2">Info</button>
                                        <button type="button" class="btn btn-light mr-2">Light</button>
                                        <button type="button" class="btn btn-dark mr-2">Dark</button>
                                        <button type="button" class="btn btn-link">Link</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>



<script src="{{ mix('/js/dashboard/main/dashboard-app.js') }}"></script>

{{--datatable--}}
<script type="text/javascript" src="/js/dashboard/datatables.net.js"></script>
<script type="text/javascript" src="/js/dashboard/DataTables-Bootstrap.js"></script>
{{--end datatable--}}
@yield('scripts')

<script>
    // datatable
    $(document).ready( function () {
        $('#table_id').DataTable(
            {
                // "scrollY":        "200px",
                // "scrollCollapse": true,

            }
        );
    } );

    // select 2
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option'
        });
    });

    // custom file
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    });

    // Choose Image
    (function( $ ) {
        $.fn.extend({
            prettyFile: function( options ) {
                var defaults = {
                    text : "Select Files"
                };

                var options =  $.extend(defaults, options);
                var plugin = this;

                function make_form( $el, text ) {
                    $el.wrap('<div></div>');

                    $el.hide();
                    $el.after( '\
				<div class="input-append input-group"">\
					<span class="input-group-btn">\
						<button class="btn" type="button">' + text + '</button>\
					</span>\
					<input class="input-large form-control" type="text">\
				</div>\
				' );

                    return $el.parent();
                };

                function bind_change( $wrap, multiple ) {
                    $wrap.find( 'input[type="file"]' ).change(function () {
                        // When original file input changes, get its value, show it in the fake input
                        var files = $( this )[0].files,
                            info = '';

                        if ( files.length == 0 )
                            return false;

                        if ( !multiple || files.length == 1 ) {
                            var path = $( this ).val().split('\\');
                            info = path[path.length - 1];
                        } else if ( files.length > 1 ) {
                            // Display number of selected files instead of filenames
                            info = files.length + ' files selected';
                        }

                        $wrap.find('.input-append input').val( info );
                    });
                };

                function bind_button( $wrap, multiple ) {
                    $wrap.find( '.input-append' ).click( function( e ) {
                        e.preventDefault();
                        $wrap.find( 'input[type="file"]' ).click();
                    });
                };

                return plugin.each( function() {
                    $this = $( this );

                    if ( $this ) {
                        var multiple = $this.attr( 'multiple' );

                        $wrap = make_form( $this, options.text );
                        bind_change( $wrap, multiple );
                        bind_button( $wrap );
                    }
                });
            }
        });
    }( jQuery ));
    (function( $ ) {

        $.fn.jPreview = function() {
            var jPreview = this;

            jPreview.preview = function(selector){
                var container = $(selector).data('jpreview-container');

                $(selector).change(function(){
                    $(container).empty();
                    $.each(selector.files, function(index, file){
                        var imageData = jPreview.readImageData(file, function(data){
                            jPreview.addPreviewImage(container, data);
                        });
                    });
                });
            }

            jPreview.readImageData = function(file, successCallback){
                var reader = new FileReader();
                reader.onload = function(event){
                    successCallback(event.target.result);
                }
                reader.readAsDataURL(file);
            }

            jPreview.addPreviewImage = function(container, imageDataUrl){
                $(container).append('<div class="jpreview-image" style="background-image: url('+ imageDataUrl +')"></div>');
            }

            var selectors = $(this);
            return $.each(selectors, function(index, selector){
                jPreview.preview(selector);
            });

        };

    }( jQuery ));
    $('.custom-file-img').prettyFile();
    $('.demo').jPreview();

</script>
</body>

</html>

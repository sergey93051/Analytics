<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src="{{asset("assets/img/logo-ct.png")}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Admin</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  @if(\Request::route()->getName() == 'home') active @endif" href="{{route('home')}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Fc Graph</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'fcGraphShow') active @endif"
                    href="{{route("fcGraphShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">FB Dashboard</span>
                </a>
            </li>

            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">MailChimp</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'emailClientHome') active @endif"
                    href="{{route("emailClientHome")}}">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(154.000000, 300.000000)">
                                    <path class="color-background opacity-6"
                                        d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                    </path>
                                    <path class="color-background"
                                        d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <span class="nav-link-text ms-1">Email Client</span>
            </a>
            </li>

            --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Shopify analytics</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'browserVisits') active @endif"
                    href="{{route("browserVisits")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Browser Statistics</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'countryShow') active @endif"
                    href="{{route("countryShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Country/City Visits</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'customersSpentShow') active @endif"
                    href="{{route("customersSpentShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" width="34px" height="34px" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <g data-name="Layer 2">
                                <g data-name="person">
                                    <rect width="24" height="24" opacity="0" />
                                    <path d="M12 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z" />
                                    <path d="M18 21a1 1 0 0 0 1-1 7 7 0 0 0-14 0 1 1 0 0 0 1 1z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">New Customers/Total Spent</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'paymantshow') active @endif"
                    href="{{route("paymantshow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" width="34px" height="34px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 466.287 466.287"
                            style="enable-background:new 0 0 466.287 466.287;" xml:space="preserve">
                            <path d="M451.287,48.634H51.957c-8.284,0-15,6.716-15,15v144.789H33.21c-18.313,0-33.21,14.898-33.21,33.21v142.809
                       c0,18.313,14.897,33.21,33.21,33.21h261.991c18.313,0,33.21-14.898,33.21-33.21v-92.548h122.876c8.284,0,15-6.716,15-15V63.634
                       C466.287,55.35,459.571,48.634,451.287,48.634z M436.287,107.741c-13.644-4.653-24.453-15.463-29.106-29.107h29.106V107.741z
                        M96.064,78.634c-4.653,13.644-15.463,24.453-29.107,29.107V78.634H96.064z M33.21,238.423h261.991c1.77,0,3.21,1.44,3.21,3.21
                       v14.135H30v-14.135C30,239.863,31.44,238.423,33.21,238.423z M188.367,170.264c0-34.882,28.374-63.26,63.25-63.26
                       c34.882,0,63.26,28.378,63.26,63.26c0,14.106-4.771,27.758-13.313,38.777c-2.061-0.401-4.187-0.618-6.363-0.618h-24.779
                       c4.88-4.842,7.909-11.549,7.909-18.95c0-12.123-8.122-22.379-19.209-25.629v-21.768c2.57,2.149,4.209,5.376,4.209,8.98
                       c0,4.142,3.357,7.5,7.5,7.5s7.5-3.358,7.5-7.5c0-12.123-8.122-22.379-19.209-25.629v-2.479c0-4.142-3.357-7.5-7.5-7.5
                       s-7.5,3.358-7.5,7.5v2.479c-11.086,3.25-19.208,13.506-19.208,25.629s8.122,22.379,19.208,25.629v21.768
                       c-2.569-2.15-4.208-5.376-4.208-8.98c0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5c0,7.402,3.028,14.108,7.908,18.95h-31.653
                       C192.862,197.511,188.367,184.284,188.367,170.264z M298.411,291.057H30v-15.289h268.411V291.057z M244.122,160.036
                       c-2.569-2.15-4.208-5.376-4.208-8.98s1.639-6.83,4.208-8.98V160.036z M259.122,198.453v-17.96c2.57,2.149,4.209,5.376,4.209,8.98
                       S261.692,196.303,259.122,198.453z M295.201,387.653H33.21c-1.77,0-3.21-1.44-3.21-3.21v-73.385h268.411v73.385
                       C298.411,386.212,296.971,387.653,295.201,387.653z M319.264,218.78c10.052-14.037,15.613-31.016,15.613-48.516
                       c0-45.91-37.351-83.26-83.26-83.26c-45.904,0-83.25,37.35-83.25,83.26c0,13.548,3.203,26.527,9.22,38.159H66.957v-79.915
                       c24.695-5.709,44.165-25.179,49.874-49.873h269.583c5.709,24.694,25.179,44.164,49.873,49.873v83.513
                       c-24.694,5.709-44.164,25.179-49.873,49.873h-58.003v-20.261C328.411,232.784,324.926,224.739,319.264,218.78z M407.181,261.894
                       c4.653-13.644,15.462-24.453,29.106-29.106v29.106H407.181z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if(\Request::route()->getName() == 'cartCheckout') active @endif"
                    href="{{route("cartCheckout")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="34px" height="34px" fill="#344767" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 487.2 487.2"
                            style="enable-background:new 0 0 467.2 467.2;" xml:space="preserve">
                            <g>
                                <path d="M448,77.3H39.2C17.6,77.3,0,94.9,0,116.5v254.2c0,21.6,17.6,39.2,39.2,39.2H448c21.6,0,39.2-17.6,39.2-39.2V116.5
                       C487.2,94.9,469.6,77.3,448,77.3z M450.4,370.7c0,1.3-1.1,2.4-2.4,2.4H39.2c-1.3,0-2.4-1.1-2.4-2.4V148.1h413.5v222.6H450.4z
                        M75.7,306.4c1-3.6,2-7.2,3.1-10.8c1.3-4.2,2.4-4.7,6.2-2.7c6.5,3.4,13.5,5.3,20.7,6.2c4.7,0.6,9.3,0.1,13.6-1.8
                       c8.1-3.5,9.4-12.9,2.5-18.5c-2.3-1.9-5-3.3-7.7-4.5c-7.1-3.1-14.5-5.5-21.2-9.5c-10.9-6.5-17.8-15.4-17-28.7
                       c0.9-15,9.4-24.3,23.1-29.3c5.7-2.1,5.7-2,5.7-7.9c0-2,0-4,0-6c0.1-4.5,0.9-5.2,5.3-5.3c1.4,0,2.7,0,4.1,0c9.5,0,9.5,0,9.5,9.4
                       c0,6.7,0,6.7,6.7,7.8c5.1,0.8,10,2.3,14.7,4.4c2.6,1.1,3.6,3,2.8,5.7c-1.2,4.1-2.3,8.2-3.6,12.2c-1.2,3.8-2.5,4.4-6.1,2.6
                       c-7.4-3.6-15.1-5.1-23.3-4.6c-2.1,0.1-4.2,0.4-6.2,1.3c-7,3.1-8.2,10.9-2.2,15.7c3,2.4,6.5,4.2,10.1,5.7c6.2,2.6,12.5,5.1,18.4,8.3
                       c18.9,10.4,23.9,34.1,10.7,50.3c-4.8,5.8-11,9.8-18.3,11.8c-3.2,0.9-4.6,2.5-4.5,5.8c0.1,3.2,0,6.5,0,9.7c0,2.9-1.5,4.5-4.3,4.5
                       c-3.5,0.1-7,0.1-10.5,0c-3.1-0.1-4.5-1.8-4.5-4.8c0-2.4,0-4.7-0.1-7.1c-0.1-5.2-0.2-5.5-5.3-6.3c-6.4-1-12.8-2.5-18.7-5.4
                       C74.8,312.4,74.3,311.3,75.7,306.4z M187.6,207.9v-15.5c0-2.7,2.2-4.8,4.8-4.8h201.5c2.7,0,4.8,2.2,4.8,4.8v15.5
                       c0,2.7-2.2,4.8-4.8,4.8H192.4C189.7,212.8,187.6,210.6,187.6,207.9z M187.6,249.8v-15.5c0-2.7,2.2-4.8,4.8-4.8h142.2
                       c2.7,0,4.8,2.2,4.8,4.8v15.5c0,2.7-2.2,4.8-4.8,4.8H192.4C189.7,254.6,187.6,252.4,187.6,249.8z M187.6,291.6v-15.5
                       c0-2.7,2.2-4.8,4.8-4.8h201.5c2.7,0,4.8,2.2,4.8,4.8v15.5c0,2.7-2.2,4.8-4.8,4.8H192.4C189.7,296.4,187.6,294.3,187.6,291.6z
                        M187.6,333.4v-15.5c0-2.7,2.2-4.8,4.8-4.8H222h20.6h57.5c2.7,0,4.8,2.2,4.8,4.8v15.5c0,2.7-2.2,4.8-4.8,4.8h-57.5H222h-29.6
                       C189.7,338.2,187.6,336.1,187.6,333.4z" />
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Cart and Checkout</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'userVisitsShow') active @endif"
                    href="{{route("userVisitsShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Users Visits</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'pageViewsShow') active @endif"
                    href="{{route("pageViewsShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                            <path class="color-background"
                                                d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"
                                                id="Path"></path>
                                            <path class="color-background"
                                                d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                id="Path" opacity="0.7"></path>
                                            <path class="color-background"
                                                d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                id="Path" opacity="0.7"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Products and Other pages</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Shopify pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'shopifyOrderShow' or \Request::route()->getName() == 'orderitem' ) active @endif"
                    href="{{route("shopifyOrderShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'shopifyCustomerShow') active @endif"
                    href="{{route("shopifyCustomerShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" width="34px" height="34px" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <g data-name="Layer 2">
                                <g data-name="person">
                                    <rect width="24" height="24" opacity="0" />
                                    <path d="M12 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z" />
                                    <path d="M18 21a1 1 0 0 0 1-1 7 7 0 0 0-14 0 1 1 0 0 0 1 1z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'shopifyDraftShow') active @endif"
                    href="{{route("shopifyDraftShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" width="34px" height="34px" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="none" d="M0 0L24 0 24 24 0 24z" />
                                <path
                                    d="M20 2c.552 0 1 .448 1 1v3.757l-8.999 9-.006 4.238 4.246.006L21 15.242V21c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V3c0-.552.448-1 1-1h16zm1.778 6.808l1.414 1.414L15.414 18l-1.416-.002.002-1.412 7.778-7.778zM12 12H7v2h5v-2zm3-4H7v2h8V8z" />
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Draft</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'shopifyProductsShow' or \Request::route()->getName() == 'shopifyCollectprodShow') active @endif"
                    href="{{route("shopifyProductsShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                            <path class="color-background"
                                                d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"
                                                id="Path"></path>
                                            <path class="color-background"
                                                d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                id="Path" opacity="0.7"></path>
                                            <path class="color-background"
                                                d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                id="Path" opacity="0.7"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'shopifyCollectionShow') active @endif"
                    href="{{route("shopifyCollectionShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" width="34px" height="34px" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Collection</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'tenderTransactionShow') active @endif"
                    href="{{route("tenderTransactionShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" width="34px" height="34px" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="#344767" stroke-width="2"
                                d="M2,7 L20,7 M16,2 L21,7 L16,12 M22,17 L4,17 M8,12 L3,17 L8,22" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Tender Transaction</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'checkoutsShow') active @endif"
                    href="{{route("checkoutsShow")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#344767" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 487.2 487.2"
                            style="enable-background:new 0 0 467.2 467.2;" xml:space="preserve">
                            <g>
                                <path d="M448,77.3H39.2C17.6,77.3,0,94.9,0,116.5v254.2c0,21.6,17.6,39.2,39.2,39.2H448c21.6,0,39.2-17.6,39.2-39.2V116.5
                           C487.2,94.9,469.6,77.3,448,77.3z M450.4,370.7c0,1.3-1.1,2.4-2.4,2.4H39.2c-1.3,0-2.4-1.1-2.4-2.4V148.1h413.5v222.6H450.4z
                            M75.7,306.4c1-3.6,2-7.2,3.1-10.8c1.3-4.2,2.4-4.7,6.2-2.7c6.5,3.4,13.5,5.3,20.7,6.2c4.7,0.6,9.3,0.1,13.6-1.8
                           c8.1-3.5,9.4-12.9,2.5-18.5c-2.3-1.9-5-3.3-7.7-4.5c-7.1-3.1-14.5-5.5-21.2-9.5c-10.9-6.5-17.8-15.4-17-28.7
                           c0.9-15,9.4-24.3,23.1-29.3c5.7-2.1,5.7-2,5.7-7.9c0-2,0-4,0-6c0.1-4.5,0.9-5.2,5.3-5.3c1.4,0,2.7,0,4.1,0c9.5,0,9.5,0,9.5,9.4
                           c0,6.7,0,6.7,6.7,7.8c5.1,0.8,10,2.3,14.7,4.4c2.6,1.1,3.6,3,2.8,5.7c-1.2,4.1-2.3,8.2-3.6,12.2c-1.2,3.8-2.5,4.4-6.1,2.6
                           c-7.4-3.6-15.1-5.1-23.3-4.6c-2.1,0.1-4.2,0.4-6.2,1.3c-7,3.1-8.2,10.9-2.2,15.7c3,2.4,6.5,4.2,10.1,5.7c6.2,2.6,12.5,5.1,18.4,8.3
                           c18.9,10.4,23.9,34.1,10.7,50.3c-4.8,5.8-11,9.8-18.3,11.8c-3.2,0.9-4.6,2.5-4.5,5.8c0.1,3.2,0,6.5,0,9.7c0,2.9-1.5,4.5-4.3,4.5
                           c-3.5,0.1-7,0.1-10.5,0c-3.1-0.1-4.5-1.8-4.5-4.8c0-2.4,0-4.7-0.1-7.1c-0.1-5.2-0.2-5.5-5.3-6.3c-6.4-1-12.8-2.5-18.7-5.4
                           C74.8,312.4,74.3,311.3,75.7,306.4z M187.6,207.9v-15.5c0-2.7,2.2-4.8,4.8-4.8h201.5c2.7,0,4.8,2.2,4.8,4.8v15.5
                           c0,2.7-2.2,4.8-4.8,4.8H192.4C189.7,212.8,187.6,210.6,187.6,207.9z M187.6,249.8v-15.5c0-2.7,2.2-4.8,4.8-4.8h142.2
                           c2.7,0,4.8,2.2,4.8,4.8v15.5c0,2.7-2.2,4.8-4.8,4.8H192.4C189.7,254.6,187.6,252.4,187.6,249.8z M187.6,291.6v-15.5
                           c0-2.7,2.2-4.8,4.8-4.8h201.5c2.7,0,4.8,2.2,4.8,4.8v15.5c0,2.7-2.2,4.8-4.8,4.8H192.4C189.7,296.4,187.6,294.3,187.6,291.6z
                            M187.6,333.4v-15.5c0-2.7,2.2-4.8,4.8-4.8H222h20.6h57.5c2.7,0,4.8,2.2,4.8,4.8v15.5c0,2.7-2.2,4.8-4.8,4.8h-57.5H222h-29.6
                           C189.7,338.2,187.6,336.1,187.6,333.4z" />
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Checkouts</span>
                </a>
            </li>
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if(\Request::route()->getName()=='orders.index') active @endif"
                    href="{{route("orders.index")}}">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(154.000000, 300.000000)">
                                    <path class="color-background opacity-6"
                                        d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                    </path>
                                    <path class="color-background"
                                        d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'customerlead.index') active @endif"
                    href="{{route("customerlead.index")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Customer/Lead</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'usersDayindex') active @endif"
                    href="{{route("usersDayindex")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Users/Dayindex</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'usersAov') active @endif"
                    href="{{route("usersAov")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Users and AOV</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'revenue') active @endif"
                    href="{{route("revenue")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Revenue</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'overallAOV') active @endif"
                    href="{{route("overallAOV")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Overall AOV By Source</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'newuser.retUser') active @endif"
                    href="{{route("newuser.retUser")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">New Users/Return Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::route()->getName() == 'usersAll') active @endif"
                    href="{{route("usersAll")}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>

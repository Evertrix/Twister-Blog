<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    {{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">--}}
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Font Awesome if you need it
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    -->
    <!--Replace with your tailwind.css once created-->
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            /*background: linear-gradient(90deg, #d53369 0%, #daae51 100%);*/

            /*background-color: #00DBDE;*/
            /*background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);*/
            background-color: #21D4FD;
            background-image: linear-gradient(90deg, #21D4FD 0%, #B721FF 100%);

        }
    </style>
    <title>Twister</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;" class="dark">
<!--Nav-->
<nav id="header" class="gradient fixed w-full z-30 top-0 text-white">

    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

        <div class="pl-4 flex items-center">
            <a class="
            toggleColour
            dark:bg-gray-800 no-underline hover:text-gray-200 font-bold text-2xl lg:text-4xl" href="/">
                <!--Icon from: http://www.potlabicons.com/ -->
                <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                    <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502"
                          transform="matrix(1,0,0,1,0,0)" fill="rgb(0,0,0)"/>
                    <path class="plane-take-off"
                          d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "/>
                </svg>
                TWISTER
            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-teal-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                        Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>

        <div
            class="w-full flex-grow lg:flex lg:items-center lg:w-auto justify-center hidden lg:block mt-2 lg:mt-0 bg-grey lg:bg-transparent text-black p-4 lg:p-0 z-20"
            id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                @auth
                    @if(!empty(auth()->user()->stripe_id))
                        <li class="mr-3">
                            <a class="inline-block py-2 px-4 text-white font-bold no-underline" href="/post/create">Create</a>
                        </li>
                        @endif
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                           href="/register">Welcome back, {{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                           href="/profile/{{ auth()->user()->username }}/edit">Profile</a>
                    </li>
                    <li class="mr-3">
                    <form method="post" action="/logout" class="font-semibold text-blue-800 ml-5">
                        @csrf
                        <button type="submit" class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4">Log Out</button>
                    </form>
                    </li>
                @else
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                           href="/register">Register</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                           href="/login">Login</a>
                    </li>
                @endauth
                <li class="mr-3">


                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" name="toggle"/>
                            <div class="slider round"></div>
                        </label>
                    </div>

                </li>
            </ul>
        </div>
    </div>

    <hr class="border-b border-gray-100 opacity-25 my-0 py-0"/>
</nav>


{{ $slot }}

<!-- Change the colour #f8fafc to match the previous section colour -->
<svg class="gradient wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
     xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#f8fafc">
                <path class="line-gradient"
                      d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"></path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF" class="line-gradient">
                <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path class="line-gradient"
                          d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                          opacity="0.100000001"></path>
                    <path class="line-gradient"
                          d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                          opacity="0.100000001"></path>
                    <path class="line-gradient"
                          d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                          opacity="0.200000003"></path>
                </g>
            </g>
        </g>
    </g>
</svg>

<section class="gradient mx-auto text-center py-6 mb-12">

    <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">Call to Action</h1>
    <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
    </div>

    <h3 class="my-4 text-3xl leading-tight text-white">Main Hero Message to sell yourself!</h3>

    <button
        class="action-btn mx-auto lg:mx-0 bg-white hover:bg-red-400 text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg">
        Action!
    </button>

</section>

{{--<!--Footer-->--}}
<footer class="[toggle === '1' ? 'bg-white' : 'bg-gray']">
    <div class="container mx-auto px-8">

        <div class="w-full flex flex-col md:flex-row py-6">

            <div class="flex-1 mb-6">

                <a class="text-orange-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <!--Icon from: http://www.potlabicons.com/ -->
                    <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512.005 512.005">
                        <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502"
                              transform="matrix(1,0,0,1,0,0)" fill="rgb(0,0,0)"/>
                        <path class="plane-take-off"
                              d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "/>
                    </svg>
                    LANDING

                </a>
            </div>


            <div class="flex-1">
                <p class="[toggle === '1' ? 'text-white-500' : 'text-gray-500'] uppercase md:mb-6">Links</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">FAQ</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Help</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Support</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="[toggle === '1' ? 'text-white-500' : 'text-gray-500'] uppercase md:mb-6">Legal</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Terms</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Privacy</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="[toggle === '1' ? 'text-white-500' : 'text-gray-500'] uppercase md:mb-6">Social</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Facebook</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Linkedin</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="[toggle === '1' ? 'text-white-500' : 'text-gray-500'] uppercase md:mb-6">Company</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Official
                            Blog</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">About
                            Us</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="[toggle === '1' ? 'text-while-800' : 'text-gray-800'] hover:text-gray-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{--    <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by freepik - www.freepik.com</a>--}}

</footer>


<!-- jQuery if you need it
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    let scrollpos = window.scrollY;
    let header = document.getElementById("header");
    let navcontent = document.getElementById("nav-content");
    let brandname = document.getElementById("brandname");
    let toToggle = document.querySelectorAll(".toggleColour");
    document.addEventListener('scroll', function () {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;
        if (scrollpos > 10) {
            header.classList.add("bg-white");
            //Use to switch toggleColour colours
            for (let i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-gray-800");
                toToggle[i].classList.remove("text-white");
            }
            header.classList.add("shadow");
        } else {
            header.classList.remove("bg-white");
            //Use to switch toggleColour colours
            for (let i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-white");
                toToggle[i].classList.remove("text-gray-800");
            }

            header.classList.remove("shadow");
        }
    });


    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);

        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);

</script>

<script>


    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- SEO Meta Tags -->
        <meta name="description" content="Pavo is a mobile app Tailwind CSS HTML template created to help you present benefits, features and information about mobile apps in order to convince visitors to download them" />
        <meta name="author" content="Your name" />

        <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter -->

        <!-- Webpage Title -->
        <title>Travelien</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
        <link href="../../css/fontawesome-all.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <link href="../../css/swiper.css" rel="stylesheet" />
        <link href="../../css/magnific-popup.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />

        <!-- Favicon  -->
        <link rel="icon" href="../../images/favicon.png" />
    </head>
    <body data-spy="scroll" data-target=".fixed-top">

        <!-- Navigation -->
        <nav class="navbar fixed-top">
            <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

                <!-- Text Logo - Use this if you don't have a graphic logo -->
                {{--<a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll" href="index.html">Travelien</a>--}}

                <!-- Image Logo -->
                <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline" href="index.html">
                    <svg class="h-16" viewBox="0 0 690 314" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M101.812 217C95.375 212 88.375 220.5 83.9375 217V145.312H57V127.375H128.688V145.312H101.812V217Z" fill="#FFB22E"/>
                        <path d="M147.562 217C140.899 214.564 136.375 220 130.5 217V150.062H134.625L140.25 158C143 155.5 146.125 153.583 149.625 152.25C153.125 150.875 156.75 150.188 160.5 150.188H175.562V167.188H160.5C158.708 167.188 157.021 167.521 155.438 168.188C153.854 168.854 152.479 169.771 151.312 170.938C150.146 172.104 149.229 173.479 148.562 175.062C147.896 176.646 147.562 178.333 147.562 180.125V217Z" fill="#FFB22E"/>
                        <path d="M247.062 217H242.938L236.312 207.812C234.688 209.271 232.958 210.646 231.125 211.938C229.333 213.188 227.438 214.292 225.438 215.25C223.438 216.167 221.375 216.896 219.25 217.438C217.167 217.979 215.042 218.25 212.875 218.25C208.167 218.25 203.729 217.458 199.562 215.875C195.438 214.292 191.812 212 188.688 209C185.604 205.958 183.167 202.25 181.375 197.875C179.583 193.5 178.688 188.521 178.688 182.938C178.688 177.729 179.583 172.958 181.375 168.625C183.167 164.25 185.604 160.5 188.688 157.375C191.812 154.25 195.438 151.833 199.562 150.125C203.729 148.375 208.167 147.5 212.875 147.5C215.042 147.5 217.188 147.771 219.312 148.312C221.438 148.854 223.5 149.604 225.5 150.562C227.5 151.521 229.396 152.646 231.188 153.938C233.021 155.229 234.729 156.625 236.312 158.125L242.938 150.188H247.062V217ZM229.875 182.938C229.875 180.604 229.417 178.354 228.5 176.188C227.625 173.979 226.417 172.042 224.875 170.375C223.333 168.667 221.521 167.312 219.438 166.312C217.396 165.271 215.208 164.75 212.875 164.75C210.542 164.75 208.333 165.146 206.25 165.938C204.208 166.729 202.417 167.896 200.875 169.438C199.375 170.979 198.188 172.896 197.312 175.188C196.438 177.438 196 180.021 196 182.938C196 185.854 196.438 188.458 197.312 190.75C198.188 193 199.375 194.896 200.875 196.438C202.417 197.979 204.208 199.146 206.25 199.938C208.333 200.729 210.542 201.125 212.875 201.125C215.208 201.125 217.396 200.625 219.438 199.625C221.521 198.583 223.333 197.229 224.875 195.562C226.417 193.854 227.625 191.917 228.5 189.75C229.417 187.542 229.875 185.271 229.875 182.938Z" fill="#FFB22E"/>
                        <path d="M279.125 217L253.625 150.062H273.062L287.688 191.812L302.25 150.062H321.75L296.25 217C289.879 213.686 285.875 221 279.125 217Z" fill="#FFB22E"/>
                        <path d="M352.875 200.625C353.542 200.833 354.208 200.979 354.875 201.062C355.542 201.104 356.208 201.125 356.875 201.125C358.542 201.125 360.146 200.896 361.688 200.438C363.229 199.979 364.667 199.333 366 198.5C367.375 197.625 368.583 196.583 369.625 195.375C370.708 194.125 371.583 192.75 372.25 191.25C373.875 200.438 383.875 195.375 384.75 203.812C383.167 206.062 381.333 208.083 379.25 209.875C377.208 211.667 374.979 213.188 372.562 214.438C370.188 215.688 367.667 216.625 365 217.25C362.375 217.917 359.667 218.25 356.875 218.25C352.167 218.25 347.729 217.375 343.562 215.625C339.438 213.875 335.812 211.438 332.688 208.312C329.604 205.188 327.167 201.479 325.375 197.188C323.583 192.854 322.688 188.104 322.688 182.938C322.688 177.646 323.583 172.812 325.375 168.438C327.167 164.062 329.604 160.333 332.688 157.25C335.812 154.167 339.438 151.771 343.562 150.062C347.729 148.354 352.167 147.5 356.875 147.5C359.667 147.5 362.396 147.833 365.062 148.5C367.729 149.167 370.25 150.125 372.625 151.375C375.042 152.625 377.292 154.167 379.375 156C381.458 157.792 383.292 159.812 384.875 162.062L352.875 200.625ZM361.625 165.438C360.833 165.146 360.042 164.958 359.25 164.875C358.5 164.792 357.708 164.75 356.875 164.75C354.542 164.75 352.333 165.188 350.25 166.062C348.208 166.896 346.417 168.104 344.875 169.688C343.375 171.271 342.188 173.188 341.312 175.438C340.438 177.646 340 180.146 340 182.938C340 183.562 340.021 184.271 340.062 185.062C340.146 185.854 340.25 186.667 340.375 187.5C340.542 188.292 340.729 189.062 340.938 189.812C341.146 190.562 341.417 191.229 341.75 191.812L361.625 165.438Z" fill="#FFB22E"/>
                        <path d="M410.688 217C405.375 210.5 395.375 218.5 393.5 217C397.167 170.469 397.35 142.495 393.5 83H410.688C406.766 141.791 406.023 174.185 410.688 217Z" fill="#FFB22E"/>
                        <path d="M440.938 217C434.33 214.562 430.875 220.5 423.75 217V150.062H440.938V217Z" fill="#FFB22E"/>
                        <path d="M480.625 200.625C481.292 200.833 481.958 200.979 482.625 201.062C483.292 201.104 483.958 201.125 484.625 201.125C486.292 201.125 487.896 200.896 489.438 200.438C490.979 199.979 492.417 199.333 493.75 198.5C495.125 197.625 496.333 196.583 497.375 195.375C498.458 194.125 499.333 192.75 500 191.25C502.283 199.039 513.375 197 512.5 203.812C510.917 206.062 509.083 208.083 507 209.875C504.958 211.667 502.729 213.188 500.312 214.438C497.938 215.688 495.417 216.625 492.75 217.25C490.125 217.917 487.417 218.25 484.625 218.25C479.917 218.25 475.479 217.375 471.312 215.625C467.188 213.875 463.562 211.438 460.438 208.312C457.354 205.188 454.917 201.479 453.125 197.188C451.333 192.854 450.438 188.104 450.438 182.938C450.438 177.646 451.333 172.812 453.125 168.438C454.917 164.062 457.354 160.333 460.438 157.25C463.562 154.167 467.188 151.771 471.312 150.062C475.479 148.354 479.917 147.5 484.625 147.5C487.417 147.5 490.146 147.833 492.812 148.5C495.479 149.167 498 150.125 500.375 151.375C502.792 152.625 505.042 154.167 507.125 156C509.208 157.792 511.042 159.812 512.625 162.062L480.625 200.625ZM489.375 165.438C488.583 165.146 487.792 164.958 487 164.875C486.25 164.792 485.458 164.75 484.625 164.75C482.292 164.75 480.083 165.188 478 166.062C475.958 166.896 474.167 168.104 472.625 169.688C471.125 171.271 469.938 173.188 469.062 175.438C468.188 177.646 467.75 180.146 467.75 182.938C467.75 183.562 467.771 184.271 467.812 185.062C467.896 185.854 468 186.667 468.125 187.5C468.292 188.292 468.479 189.062 468.688 189.812C468.896 190.562 469.167 191.229 469.5 191.812L489.375 165.438Z" fill="#FFB22E"/>
                        <path d="M538.312 217C531.649 213.162 526.875 221.5 521.25 217V150.062H525.375L531 156.562C533.75 154.062 536.854 152.146 540.312 150.812C543.812 149.438 547.458 148.75 551.25 148.75C555.333 148.75 559.188 149.542 562.812 151.125C566.438 152.667 569.604 154.812 572.312 157.562C575.021 160.271 577.146 163.458 578.688 167.125C580.271 170.75 581.062 174.625 581.062 178.75V217C574.19 214.767 570.375 220.5 564 217V178.75C564 177 563.667 175.354 563 173.812C562.333 172.229 561.417 170.854 560.25 169.688C559.083 168.521 557.729 167.604 556.188 166.938C554.646 166.271 553 165.938 551.25 165.938C549.458 165.938 547.771 166.271 546.188 166.938C544.604 167.604 543.229 168.521 542.062 169.688C540.896 170.854 539.979 172.229 539.312 173.812C538.646 175.354 538.312 177 538.312 178.75V217Z" fill="#FFB22E"/>
                        <path d="M403.135 103.795C402.346 100.649 401.373 98.9057 399.261 95.8116L399.61 103.045C396.684 101.526 395.706 101.506 394.263 101.848C397.309 103.831 398.72 105.231 400.432 108.192C398.73 115.589 397.208 118.84 393.607 123.246C391.613 120.391 390.476 118.965 388.243 118.181C390.371 120.938 390.658 122.939 391.009 126.587C387.06 135.205 384.24 139.072 378.298 144.523C375.29 135.672 374.282 130.49 375.23 120.356C378.944 116.875 380.586 115.491 382.34 114.529C381.048 113.71 379.426 114.573 376.125 116.712C377.3 111.31 378.396 108.56 381.606 104.458C384.191 101.881 385.599 100.671 387.991 99.226C386.176 98.6414 384.755 99.1449 381.999 100.498L390.109 89.9712L377.92 99.96C376.381 97.4323 375.871 95.7842 375.459 92.5171C373.887 96.3424 373.533 98.6639 374.002 103.171L362.936 113.937C360.552 110.676 360.109 108.719 360.077 105.122C358.472 108.855 358.731 111.616 360.219 117.134L351.317 127.582C352.227 94.6323 359.441 82.5204 395.476 82.9049C388.064 81.0499 384.062 79.6746 374.435 82.6839C376.939 79.3717 377.65 77.7484 377.98 75.1703C374.499 76.9338 372.915 78.3704 370.434 81.3538C368.784 79.881 367.413 79.1339 362.749 78.1919C365.201 75.9675 366.671 74.6895 366.705 73.2519C364.447 73.1575 362.818 74.3752 359.607 77.6135C357.533 75.527 355.973 74.6825 352.093 74.0686C355.29 72.4231 355.938 71.6934 356.447 70.5012C353.399 70.7221 351.761 71.5215 348.925 73.7543L340.029 74.7381C361.039 60.3669 372.928 60.9439 394.323 77.0582L389.923 71.6893C392.505 72.3557 393.131 72.0575 393.962 71.2901C391.586 70.0554 390.337 69.134 388.427 66.6084C387.627 63.0568 387.685 60.9744 388.433 57.144L392.976 59.7276L388.338 54.0685C389.25 49.2136 390.962 46.8839 394.771 42.9754C397.713 46.4 398.957 48.5027 399.927 52.8186L397.607 57.3876C399.658 57.8645 400.086 57.1956 401.051 56.2629C403.227 59.4247 404.032 61.2812 403.791 64.9331C402.653 67.4189 401.817 68.7324 399.611 70.784C402.188 70.914 403.014 70.1354 404.48 68.7342L404.404 72.1927C416.658 52.1085 426.124 46.312 449.556 49.7435C446.531 50.6036 444.807 51.5512 441.719 53.4985C439.282 52.5926 437.201 52.6459 432.954 53.1622C436.975 53.8617 438.281 54.3641 439.397 55.4011L439.269 55.4736C436.679 56.9375 435.187 57.7804 434.425 61.1734C430.744 59.6501 428.508 59.4012 424.102 60.416C428.124 61.2734 429.64 62.0132 431.378 63.6706C427.794 64.8482 426.651 66.3591 424.703 69.1407C420.654 67.197 418.605 67.1459 415.105 67.7887C418.702 69.2861 420.313 70.2357 422.131 72.2183C413.924 72.8282 410.249 76.0717 403.606 81.5785C433.95 73.4833 447.264 77.0671 457.882 112.292C454.849 108.52 452.235 107.007 447.184 104.565C447.367 99.6745 446.947 97.068 444.205 92.9382C444.404 96.544 444.352 98.5511 443.169 102.034C438.776 99.0344 435.867 97.484 429.462 95.075C429.391 91.0063 428.537 88.9374 425.191 85.7196C426.291 89.0124 426.286 90.6581 424.339 92.967C415.894 87.7375 411.608 86.3634 404.718 86.4881C411.648 89.1104 415.015 91.2638 419.84 96.6534C416.7 96.31 415.379 96.4986 413.637 97.3711C417.351 97.7786 418.96 98.2226 420.899 99.4246C425.349 104.714 427.184 107.611 429.053 112.631C426.239 111.084 424.875 111.019 422.624 111.594C427.83 113.313 429.183 114.362 430.825 116.273C433.416 127.062 433.399 131.859 432.626 139.781C426.463 136.156 423.042 133.565 417.209 124.521C416.567 120.597 416.56 118.59 417.691 115.637C414.99 117.099 414.272 118.647 413.841 122.187C409.152 117.734 406.688 114.962 404.8 105.826C407.046 102.688 408.134 101.595 409.864 100.463C408.906 99.9121 407.51 100.556 403.135 103.795Z" fill="#7BC422"/>
                        <path d="M587.786 217.243C582.865 216.554 580.536 216.617 576.875 217.243C577.852 176.472 583.436 154.772 598.181 153C606.66 159.129 604.743 189.257 595.011 216.283L587.786 217.243Z" fill="#7BC422"/>
                        <path d="M595.011 216.283L587.786 217.243L598.181 153C606.66 159.129 604.743 189.257 595.011 216.283Z" fill="#6FB717"/>
                        <path d="M585.877 222.289C585.605 205.034 609.174 160.63 629.596 166.537C637.853 177.097 632.554 195.13 618.169 223.396C610.058 223.675 605.971 223.322 600.917 220.221C595.583 219.192 592.399 219.272 585.877 222.289Z" fill="#168AC4"/>
                        <path d="M618.169 223.396C632.554 195.129 637.853 177.096 629.596 166.537C625.098 169.641 616.734 188.93 600.917 220.221C605.971 223.321 610.058 223.675 618.169 223.396Z" fill="#0B7AB1"/>
                        <path d="M619.864 181.527L614.482 169.934L610.575 173.109L617.947 185.884H632.766C633.209 183.901 633.331 182.784 633.43 180.789L619.864 181.527Z" fill="#96CCE8"/>
                        <path d="M616.178 189.281L608.511 175.103C603.756 180.16 601.766 183.182 598.41 188.025L608.584 204.788L626.426 205.896C629.399 199.398 630.647 195.759 632.103 189.281H616.178Z" fill="#96CCE8"/>
                    </svg>
                </a>

                <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
                    <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center" id="navbarsExampleDefault">
                    <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                        <li>
                            <a class="nav-link page-scroll" href="#header">Home</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="#features">Features</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="#details">Details</a>
                        </li>
                        @auth
                            @role('user')
                                <li>
                                    <a href="{{ route('user.dashboard') }}" class="nav-link page-scroll">Dashboard</a>
                                </li>
                            @endrole
                            @role('admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link page-scroll">Dashboard</a>
                                </li>
                            @endrole
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="nav-link page-scroll">Log in</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="nav-link page-scroll">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div> <!-- end of navbar-collapse -->
            </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
        <!-- end of navigation -->

        <!-- Header -->
        <header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
                    <h1 class="h1-large mb-5">Travel Ticket Web Application</h1>
                    <p class="p-large mb-8">Memulai untuk menjelajahi wisata dengan memesan tiket yang dapat dipesan dimana saja</p>
                    <a class="btn-solid-lg" href="{{ route('spot.index') }}">Pesan Tiket Sekarang</a>
                </div>
                <div class="xl:text-right">
                    <img class="inline shadow rounded-lg" src="../../../images/pantai-landing-page.jpg" alt="alternative" />
                </div>
            </div> <!-- end of container -->
        </header> <!-- end of header -->
        <!-- end of header -->


        <!-- Introduction -->
        <div id="features" class="pt-4 pb-14 text-center">
            <div class="container px-4 sm:px-8 xl:px-4">
                <p class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Travelien merupakan website pemesanan tiket pantai online untuk wilayah Kabupaten Jember. Belilah tiket dengan hanya sekali klik melalui di manapun dan kapan pun yang kalian inginkan!</p>
            </div> <!-- end of container -->
        </div>
        <!-- end of introduction -->


        <!-- Features -->
        <div class="cards-1">
            <div class="container px-4 sm:px-8 xl:px-4">

                <!-- Card:mudah -->
                <div class="card">
                    <div class="card-image">
                        <img src="../../images/features-icon-5.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Mudah</h5>
                        <p class="mb-4">Lakukan pembelian tiket melalui rumah Anda tanpa harus datang ke loket</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card:cepat -->
                <div class="card">
                    <div class="card-image">
                        <img src="../../images/features-icon-6.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cepat</h5>
                        <p class="mb-4">Dengan satu klik, pembayaran akan diproses dan tiket didapatkan.</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card:aman -->
                <div class="card">
                    <div class="card-image">
                        <img src="../../images/features-icon-1.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Aman</h5>
                        <p class="mb-4">Data yang digunakan akan dijaga sehingga Anda tidak perlu khawatir.</p>
                    </div>
                </div>
                <!-- end of card -->

            </div> <!-- end of container -->
        </div> <!-- end of cards-1 -->
        <!-- end of features -->


        <!-- Details 1 -->
        <div id="details" class="pt-12 pb-16 lg:pt-16">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
                <div class="lg:col-span-5">
                    <div class="mb-16 lg:mb-0 xl:mt-16">
                        <h2 class="mb-6">Pantai Papuma</h2>
                        <p class="mb-4">'Pantai Putih Malikan' adalah wisata alam lokal Kabupaten Jember yang memiliki keindahan alam yang unik. Pasir putihnya sangat menarik wisatawan dan akan membuat Anda jatuh cinta.</p>
                    </div>
                </div> <!-- end of col -->
                <div class="lg:col-span-7">
                    <div class="xl:ml-14">
                        <img class="inline rounded-lg shadow-md" src="../../images/pantai-papuma.jpg" alt="alternative" />
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of container -->
        </div>
        <!-- end of details 1 -->


        <!-- Details 2 -->
        <div class="py-24">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
                <div class="lg:col-span-7">
                    <div class="mb-12 lg:mb-0 xl:mr-14">
                        <img class="inline rounded-lg shadow-md" src="../../images/pantai-teluk-love.jpg" alt="alternative" />
                    </div>
                </div> <!-- end of col -->
                <div class="lg:col-span-5">
                    <div class="xl:mt-12">
                        <h2 class="mb-6">Pantai Teluk Love</h2>
                        <p class="list mb-7 space-y-2">
                            Pantai Teluk Love merupakan pemandangan teluk berbentuk hati yang luas dan terkenal di penjuru Nusantara. Akses masuk yang ramai dan artistik akan membuat Anda terkesima hingga sampai pada lokasi tujuan.
                        </p>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of container -->
        </div>
        <!-- end of details 2 -->

        <!-- Footer -->
        <div class="footer">
            <div class="container px-4 sm:px-8">
                <h4 class="mb-8 lg:max-w-3xl lg:mx-auto">Travelien akan membawa Anda ke pantai tujuan dengan mudah, cepat, dan aman.</h4>
            </div> <!-- end of container -->
        </div> <!-- end of footer -->
        <!-- end of footer -->


        <!-- Copyright -->
        <div class="copyright">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-3">
                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2"><a href="#">Article Details</a></li>
                    <li class="mb-2"><a href="#">Terms & Conditions</a></li>
                    <li class="mb-2"><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="pb-2 p-small statement">Copyright © <a href="#" class="no-underline">Travelien</a></p>

                <p class="pb-2 p-small statement">Created by :<a href="#" class="no-underline"> Sistem Informasi PWEB B2</a></p>
            </div>
        <!-- end of container -->
        </div> <!-- end of copyright -->
        <!-- end of copyright -->


        <!-- Scripts -->
        <script src="../../js/jquery.min.js"></script> <!-- jQuery for JavaScript plugins -->
        <script src="../../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="../../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="../../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
        <script src="../../js/scripts.js"></script> <!-- Custom scripts -->
    </body>
</html>

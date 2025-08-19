<!-- Navbar Start -->
<nav id="navbar" class="navbar fixed top-0 start-0 end-0 z-50 transition-all duration-300 py-5 items-center bg-white shadow-md">
    <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap lg:flex-nowrap items-center">

            <!-- LOGO -->
            
            <a href="/" id="logo-dark" class="flex items-center">
                <img src="{{ asset('images/logo/shirtly_black.svg') }}" class="h-9" alt="Logo Dark">
            </a>

            

            <!-- NAVIGATION -->
            <div id="navbarCollapse" class="navigation hs-collapse transition-all duration-300 lg:flex lg:items-center basis-full grow hidden mt-6 lg:mt-0">
                <ul class="navbar-nav flex flex-col lg:flex-row gap-2 lg:gap-3 justify-center mx-auto" id="navbar-navlist">
                    <li><a href="/" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Home</a></li>
                    <li><a href="/#services" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Caratteristiche</a></li>
                    <li><a href="/#features" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Come</a></li>
                    <li><a href="/#about" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Perchè</a></li>
                    <li><a href="/#pricing" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Prezzi</a></li>
                    <li><a href="/#faq" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Faq</a></li>
                    <li><a href="/#testimonial" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Partner</a></li>
                
                    <li><a href="/#contact" class="nav-link text-sm lg:text-base font-medium px-2 py-0.5 capitalize hover:text-purple-600 transition-all">Contatti</a></li>
                </ul>
            </div>

            <!-- CTA -->
            <div class="ms-auto shrink inline-flex gap-2">
                <a href="/fabric/{{$firstTessuto->slug }}" class="focus:outline-none text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-900 font-medium rounded-lg text-base px-5 py-2 transition-all duration-300">
                    Configuratore
                </a>
            </div>
        </div>
    </div>
</nav>

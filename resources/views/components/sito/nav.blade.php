<a href="/" class="flex items-center justify-center mx-auto mb-14">
    <img src="{{ asset('images/logo/logo_ravizza.webp') }}" class="h-22" alt="Logo White">
</a>
<!-- Navbar Start -->
<nav>
    <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap lg:flex-nowrap items-center">


            <div id="navbarCollapse" class="">
                <ul class="navbar-nav flex flex-col lg:flex-row gap-2 lg:gap-3 justify-center mx-auto"
                    id="navbar-navlist">
                    <li><a href="/fabric/{{$firstTessuto->slug }}"
                            class="nav-link text-sm lg:text-lg font-bold px-2 py-0.5 uppercase text-[#646b2c] hover:text-[#193820] hover:underline transition-all">Crea la tua camicia</a>
                    </li>
                    <li>
                        @if(isset($link) && $link == "history")
                                <a href="/la-nostra-storia"
                            class="nav-link text-sm lg:text-lg font-bold px-2 py-0.5 uppercase text-[#193820] underline transition-all">La nostra storia</a>
                                @else
                                <a href="/la-nostra-storia"
                            class="nav-link text-sm lg:text-lg font-bold px-2 py-0.5 uppercase text-[#646b2c] hover:text-[#193820] hover:underline transition-all">La nostra storia</a>
                            @endif
                        
                    </li>
                    <li>
                        @if(isset($link) && $link == "contact")
                                <a href="/contatti"
                            class="nav-link text-sm lg:text-lg font-bold px-2 py-0.5 uppercase text-[#193820] underline transition-all">Contatti</a>
                                @else
                                <a href="/contatti"
                            class="nav-link text-sm lg:text-lg font-bold px-2 py-0.5 uppercase text-[#646b2c] hover:text-[#193820] hover:underline transition-all">Contatti</a>
                            @endif
                        
                        
                    </li>
                    
                </ul>
            </div>


        </div>
    </div>
</nav>
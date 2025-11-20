<footer>
    <div class="mx-auto w-full max-w-screen-2xl px-6 py-6 lg:py-8">
        <div class="md:flex md:justify-between py-12">


            <div>
                <ul class="text-[#646b2c] text-sm transition-all font-medium uppercase">
                    <li>
                    <p>Lavoriamo solo con Tessuti di alta qualità</p>
                    </li>
                    <li class="mt-4">
                        <img src="{{ asset('images/sito/loghi_tessuti.png') }}" class="h-22" alt="Logo White">
                    </li>
                    
                </ul>
            </div>

            <div>

                <ul class="text-[#646b2c] text-sm transition-all font-medium text-right uppercase">
                    
                    <li class="mt-4">
                        @if(isset($link) && $link == "privacy")
                                <a href="/privacy-policy" class="underline text-[#193820]">Privacy Policy</a>
                                @else
                                <a href="/privacy-policy" class="hover:underline hover:text-[#193820]">Privacy Policy</a>
                            @endif
                    </li>
                    <li>
                         @if(isset($link) && $link == "cookie")
                                <a href="/cookie-policy" class="underline text-[#193820]">Cookie Policy</a>
                            @else
                                <a href="/cookie-policy" class="hover:underline hover:text-[#193820]">Cookie Policy</a>
                            @endif
                        
                    </li>
                </ul>
            </div>


        </div>

    </div>

</footer>


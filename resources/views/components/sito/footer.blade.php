<footer>
    <div class="mx-auto w-full max-w-screen-2xl px-6 py-6 lg:py-8">
        <div class="md:flex md:justify-between py-12">


            <div>
                <ul class="text-[#646b2c] text-sm transition-all font-medium uppercase">
                    <li>
                    <p>Viale Carlo Espinasse 82,<br />20156 MIlano</p>
                    </li>
                    <li class="mt-4">
                        <span>cell +39 333 8028502</span>
                    </li>
                    <li>
                        <span">tel +39 02 85687613</span>
                    </li>
                </ul>
            </div>

            <div>

                <ul class="text-[#646b2c] text-sm transition-all font-medium text-right uppercase">
                    <li>
                    <p>© 2025 - ravizza lab<br />PIVA 000000000</p>
                    </li>
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


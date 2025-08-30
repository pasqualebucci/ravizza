<footer class="rounded-lg shadow-sm bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="flex justify-between ">

            <div>
                <img class="w-40 h-auto " src="{{ asset('images/logo/logo_ravizza.webp') }}" alt="logo">
                <ul class="mt-6 flex space-x-4">
                    <li class="">
                        <a class="text-white" href="https://www.facebook.com/digitall.uno/"><x-ri-facebook-circle-line
                                class="h-7" />
                        </a>
                    </li>
                    <li class="">
                        <a class="text-white" href="https://www.instagram.com/digitall.uno/"><x-ri-instagram-line
                                class="h-7" />
                        </a>
                    </li>
                    <li class="">
                        <a class="text-white" href="https://www.youtube.com/@digitallwebagency"><x-ri-youtube-line
                                class="h-7" />
                        </a>
                    </li>
                    <li class="">
                        <a class="text-white" href="https://wa.me/393929068895"><x-ri-whatsapp-line class="h-7" />
                        </a>
                    </li>
                </ul>

            </div>

            <ul class="flex flex-wrap items-start justify-start">
                <li>
                    <a href="{{ url('lang/it') }}" class="hover:underline me-4 md:me-6 flex items-center">
                        <img src="{{ asset('images/flags/it.svg') }}" alt="Italiano" class="w-7">
                    </a>
                </li>
                <li>
                    <a href="{{ url('lang/en') }}">
                        <img src="{{ asset('images/flags/gb.svg') }}" alt="English" class="w-7">
                    </a>
                </li>


            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <p class="text-sm text-gray-300">
                © 2025 Ravizza Lab&nbsp;-&nbsp;P.IVA
                00000000000<br />
                Design, sviluppo e prompt engineering a cura di Pasquale Bucci per <a href="https://digitall.uno/" class="hover:underline">Digitall</a></p>
        </div>

    </div>
</footer>
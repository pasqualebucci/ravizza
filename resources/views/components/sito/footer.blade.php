<footer id="footer" class="bg-slate-900">
    <div class="mx-auto w-full max-w-7xl px-6 py-6 lg:py-8">
        <div class="md:flex md:justify-between py-12">
            <div class="mb-12 md:mb-0">
                <a href="/" class="flex items-center">
                    <img class="block w-auto h-8 " src="{{ asset('images/logo/shirtly_white.svg') }}" alt="logo">
                </a>
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
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase ">Risorse</h2>
                    <ul class="text-gray-500  font-medium">
                        <li class="mb-4">
                            <a href="/fabric/{{$firstTessuto->slug }}" class="hover:underline">Configuratore</a>
                        </li>
                        <li>
                            <a href="/docs" class="hover:underline">Documentazione</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase ">Commerciale</h2>
                    <ul class="text-gray-500  font-medium">
                        <li class="mb-4">
                            <a id="nav-link-f" href="/#contact" class="hover:underline">Contatti</a>
                        </li>
                        <li>
                            <a href="https://wa.me/393932537526?text=Ciao%20Shirtly!%20Vorrei%20avere%20maggiori%20informazioni."
                                class="hover:underline" target="_blank">WhatsApp</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase ">Legal</h2>
                    <ul class="text-gray-500  font-medium">
                        <li class="mb-4">
                            @if(isset($link) && $link == "privacy")
                                <a href="/privacy-policy" class="hover:underline text-purple-500">Privacy Policy</a>
                            @else
                                <a href="/privacy-policy" class="hover:underline">Privacy Policy</a>
                            @endif
                        </li>
                        <li>
                            @if(isset($link) && $link == "cookie")
                                <a href="/cookie-policy" class="hover:underline text-purple-500">Cookie Policy</a>
                            @else
                                <a href="/cookie-policy" class="hover:underline">Cookie Policy</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900">
        <div class="mx-auto w-full max-w-7xl px-6 lg:py-4">

            <p class="text-sm text-gray-300 text-center">© 2025 Shirtly by <a href="https://digitall.uno/"
                    class="hover:underline">Digitall</a>&nbsp;-&nbsp;P.IVA 03324090731<br />
                Design, sviluppo e prompt engineering a cura di Pasquale Bucci
            </p>

        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const link = document.getElementById('nav-link-f');

        function setActiveLink() {
            const hash = window.location.hash;

            if (link.getAttribute('href') === '/' + hash) {
                link.classList.add('text-purple-500');
            } else {
                link.classList.remove('text-purple-500');
            }

        }

        setActiveLink();

        // aggiorna il link attivo anche quando clicchi
        window.addEventListener('hashchange', setActiveLink);
    });
</script>
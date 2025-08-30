<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Ravizza Lab - Configuratore 3D</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('images/favicon/favicon.svg') }}" type="image/svg+xml">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <!-- Fonts monograms-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Tangerine:wght@400;700&family=Yellowtail&display=swap" rel="stylesheet">

  <!-- social -->
  <x-social-meta
    title="{{ $tessuto->nome }} - Camicia su Misura"
    description="{{ strip_tags($tessuto->descrizione) }}"
    image="{{ asset('storage/' . $tessuto->image) }}" />

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

  <!-- hook head -->
  {!! $settings['head_scripts'] !!}

<!-- Dropzone.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="536b42c6-7dd1-4eab-9a36-165727885078" data-blockingmode="auto" type="text/javascript"></script>

@livewireStyles
</head>

<body class="bg-[var(--theme-bg-color)] text-gray-900 font-instrument-sans antialiased">
  <!-- hook body -->
  {!! $settings['body_scripts'] !!}

  @livewire('shirt-configurator',[
  'tessuto' => $tessuto,
  'tessuti' => $tessuti,
  'colletti' => $colletti,
  'bottoni' => $bottoni,
  'asole' => $asole,
  'maniche' => $maniche,
  'polsini' => $polsini,
  'taschini' => $taschini,
  'fronte' => $fronte,
  'dietro' => $dietro,
  'ini_color' => $inicolor,
  'ini_style' => $inistyle,
  'ini_position' => $iniposition,
  'settings' => $settings,
  'elenco' => $elenco,
  'locale' => $locale,
  
  ])
  <x-footer />

  <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  
  <script>
    window.SnipcartSettings = {
      publicApiKey: "YTFhODI0MjAtZTM1Yi00ZGUyLWIzNmUtNmVhYTg1OTZhM2ZlNjM2NTc2Njk5OTMwNTg1MjAz",
      loadStrategy: "on-user-interaction",
      modalStyle: "side",
      addProductBehavior: "none",
    };


    (function() {
      var c, d;
      (d = (c = window.SnipcartSettings).version) != null || (c.version = "3.0");
      var s, S;
      (S = (s = window.SnipcartSettings).timeoutDuration) != null || (s.timeoutDuration = 2750);
      var l, p;
      (p = (l = window.SnipcartSettings).domain) != null || (l.domain = "cdn.snipcart.com");
      var w, u;
      (u = (w = window.SnipcartSettings).protocol) != null || (w.protocol = "https");
      var m, g;
      (g = (m = window.SnipcartSettings).loadCSS) != null || (m.loadCSS = !0);
      var y = window.SnipcartSettings.version.includes("v3.0.0-ci") || window.SnipcartSettings.version != "3.0" && window.SnipcartSettings.version.localeCompare("3.4.0", void 0, {
          numeric: !0,
          sensitivity: "base"
        }) === -1,
        f = ["focus", "mouseover", "touchmove", "scroll", "keydown"];
      window.LoadSnipcart = o;
      document.readyState === "loading" ? document.addEventListener("DOMContentLoaded", r) : r();

      function r() {
        window.SnipcartSettings.loadStrategy ? window.SnipcartSettings.loadStrategy === "on-user-interaction" && (f.forEach(function(t) {
          return document.addEventListener(t, o)
        }), setTimeout(o, window.SnipcartSettings.timeoutDuration)) : o()
      }
      var a = !1;

      function o() {
        if (a) return;
        a = !0;
        let t = document.getElementsByTagName("head")[0],
          n = document.querySelector("#snipcart"),
          i = document.querySelector('src[src^="'.concat(window.SnipcartSettings.protocol, "://").concat(window.SnipcartSettings.domain, '"][src$="snipcart.js"]')),
          e = document.querySelector('link[href^="'.concat(window.SnipcartSettings.protocol, "://").concat(window.SnipcartSettings.domain, '"][href$="snipcart.css"]'));
        n || (n = document.createElement("div"), n.id = "snipcart", n.setAttribute("hidden", "true"), document.body.appendChild(n)), h(n), i || (i = document.createElement("script"), i.src = "".concat(window.SnipcartSettings.protocol, "://").concat(window.SnipcartSettings.domain, "/themes/v").concat(window.SnipcartSettings.version, "/default/snipcart.js"), i.async = !0, t.appendChild(i)), !e && window.SnipcartSettings.loadCSS && (e = document.createElement("link"), e.rel = "stylesheet", e.type = "text/css", e.href = "".concat(window.SnipcartSettings.protocol, "://").concat(window.SnipcartSettings.domain, "/themes/v").concat(window.SnipcartSettings.version, "/default/snipcart.css"), t.prepend(e)), f.forEach(function(v) {
          return document.removeEventListener(v, o)
        })
      }

      function h(t) {
        !y || (t.dataset.apiKey = window.SnipcartSettings.publicApiKey, window.SnipcartSettings.addProductBehavior && (t.dataset.configAddProductBehavior = window.SnipcartSettings.addProductBehavior), window.SnipcartSettings.modalStyle && (t.dataset.configModalStyle = window.SnipcartSettings.modalStyle), window.SnipcartSettings.currency && (t.dataset.currency = window.SnipcartSettings.currency), window.SnipcartSettings.templatesUrl && (t.dataset.templatesUrl = window.SnipcartSettings.templatesUrl))
      }
    })();
  </script>

  <!-- hook footer -->
  {!! $settings['footer_scripts'] !!}

  @livewireScripts
</body>

</html>
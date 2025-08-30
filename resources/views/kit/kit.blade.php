<div class="flex-1 grid grid-cols-1 md:grid-cols-1 md:gap-4 overflow-auto"> <!-- Changed to overflow-auto -->

    @if($fase === 'tessuti')
    <div>
        @include('menu.tessuto')
    </div>
    @elseif($fase === 'personalizzazione')

    <div>
        @if($currentView === 'colletti')
        @include('menu.colletti')
        @elseif($currentView === 'maniche')
        @include('menu.maniche')
        @elseif($currentView === 'polsini')
        @include('menu.polsini')
        @elseif($currentView === 'taschini')
        @include('menu.taschini')
        @elseif($currentView === 'fronte')
        @include('menu.fronte')
        @elseif($currentView === 'dietro')
        @include('menu.dietro')
        @elseif($currentView === 'bottoni')
        @include('menu.bottoni')
        @elseif($currentView === 'asole')
        @include('menu.asole')
        @elseif($currentView === 'iniziali')
        @include('menu.iniziali')
        @endif
    </div>

    @elseif($fase === 'misure')
    <div>
        @if($currentMisure === 'Misura con taglia')
        @include('menu.misure-taglia')
        @elseif($currentMisure === 'Misura il tuo corpo')
        @include('menu.misure-corpo')
        @elseif($currentMisure === 'Inviaci una camicia')
        @include('menu.misure-invia')
        @elseif($currentMisure === 'Misura la tua camicia')
        @include('menu.misure-camicia')
        @elseif($currentMisure === 'SizeYou')
        @include('menu.misure-sizeyou')
        @endif
    </div>

    @elseif($fase === 'tryon')
    <div>
        @include('menu.tryon')
    </div>
    @endif

</div>
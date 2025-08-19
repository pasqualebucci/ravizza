<!-- Product Details -->
<div class="space-y-6 pt-4">
    
    @php
    $temp = collect($colletti)->firstWhere('id', $currentCollar);
    $nomeColletto = $temp['nome'];
    $prezzoColletto = $temp['prezzo'];
    $prezzoCollettoScontato = $temp['prezzo_scontato'];

    $temp = collect($maniche)->firstWhere('id', $currentManica);
    $nomeManica = $temp['nome'];
    $prezzoManica = $temp['prezzo'];
    $prezzoManicaScontato = $temp['prezzo_scontato'];

    $temp = collect($polsini)->firstWhere('id', $currentPolsino);
    $nomePolsino = $temp['nome'];
    $prezzoPolsino = $temp['prezzo'];
    $prezzoPolsinoScontato = $temp['prezzo_scontato'];

    $temp = collect($taschini)->firstWhere('id', $currentTaschino);
    $nomeTaschino = $temp['nome'];
    $prezzoTaschino = $temp['prezzo'];
    $prezzoTaschinoScontato = $temp['prezzo_scontato'];

    $temp = collect($bottoni)->firstWhere('id', $currentButton);
    $nomeBottone = $temp['nome'];
    $prezzoBottone = $temp['prezzo'];
    $prezzoBottoneScontato = $temp['prezzo_scontato'];

    $temp = collect($asole)->firstWhere('id', $currentAsola);
    $nomeAsola = $temp['nome'];
    $prezzoAsola = $temp['prezzo'];
    $prezzoAsolaScontato = $temp['prezzo_scontato'];

    $temp = collect($fronte)->firstWhere('id', $currentFronte);
    $nomeFronte = $temp['nome'];
    $prezzoFronte = $temp['prezzo'];
    $prezzoFronteScontato = $temp['prezzo_scontato'];

    $temp = collect($dietro)->firstWhere('id', $currentDietro);
    $nomeDietro = $temp['nome'];
    $prezzoDietro = $temp['prezzo'];
    $prezzoDietroScontato = $temp['prezzo_scontato'];

    @endphp
    <!-- Product Title -->
    <div>
        <h1 class="text-2xl font-bold text-[var(--theme-accent-color)] sm:text-3xl">
            {{$tessuto->nome}}
        </h1>
        <p class="mt-3 text-sm text-gray-500">SKU: {{$tessuto->codice ?? 'TST-' . $tessuto->id}}</p>
    </div>

    <!-- Price -->
    @php

    $prezzoBase = $tessuto->prezzo_scontato > 0 ? $tessuto->prezzo_scontato : $tessuto->prezzo;
    $prezzoProdotto = $tessuto->prezzo;

    $prezzoFinale = 0;
    @endphp
    <!-- Prezzo tessuto -->
    @if($tessuto->prezzo_scontato > 0)
    <div class="flex items-baseline w-full mb-1">
        <p class="text-3xl font-bold tracking-tight text-[var(--theme-accent-color)]">
            € {{number_format($tessuto->prezzo_scontato, 2)}} <span class="text-sm font-medium">{{ __('shirt.vat_included') }}</span>
        </p>
    </div>
    <p class="tracking-tight ">
    {{ __('shirt.regular_price') }}: <span class="line-through">€ {{number_format($tessuto->prezzo, 2)}}</span>
        <span class="text-[var(--theme-accent-color)]">-{{ number_format((($tessuto->prezzo - $tessuto->prezzo_scontato) / $tessuto->prezzo) * 100, 0) }}%</span>
    </p>
    @else
    <div class="flex items-baseline w-full mb-6">
        <p class="text-3xl font-bold tracking-tight text-[var(--theme-accent-color)]">
            € {{number_format($tessuto->prezzo, 2)}} <span class="text-sm font-medium">{{ __('shirt.vat_included') }}</span>
        </p>
    </div>
    @endif
    <!-- Prezzo colletto -->
    @if($prezzoCollettoScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoCollettoScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeColletto}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoCollettoScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoColletto, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoColletto > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoColletto;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeColletto}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoColletto, 2)}}
        </p>
    </div>
    @endif
    @endif
    <!-- Prezzo manica -->
    @if($prezzoManicaScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoManicaScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeManica}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoManicaScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoManica, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoManica > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoManica;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeManica}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoManica, 2)}}
        </p>
    </div>
    @endif
    @endif

    <!-- Prezzo polsino -->
    @if($currentManica == 1)
    @if($prezzoPolsinoScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoPolsinoScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomePolsino}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoPolsinoScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoPolsino, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoPolsino > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoPolsino;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomePolsino}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoPolsino, 2)}}
        </p>
    </div>
    @endif
    @endif
    @endif
    <!-- Prezzo Taschino -->
    @if($prezzoTaschinoScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoTaschinoScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeTaschino}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoTaschinoScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoTaschino, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoTaschino > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoTaschino;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeTaschino}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoTaschino, 2)}}
        </p>
    </div>
    @endif
    @endif

    <!-- Prezzo bottone -->
    @if($prezzoBottoneScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoBottoneScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeBottone}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoBottoneScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoBottone, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoBottone > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoBottone;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeBottone}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoBottone, 2)}}
        </p>
    </div>
    @endif
    @endif

    <!-- Prezzo asola -->
    @if($prezzoAsolaScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoAsolaScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeAsola}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoAsolaScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoAsola, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoAsola > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoAsola;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeAsola}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoAsola, 2)}}
        </p>
    </div>
    @endif
    @endif

    <!-- Prezzo Fronte -->
    @if($prezzoFronteScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoFronteScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeFronte}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoFronteScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoFronte, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoFronte > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoFronte;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeFronte}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoFronte, 2)}}
        </p>
    </div>
    @endif
    @endif

    <!-- Prezzo dietro -->
    @if($prezzoDietroScontato > 0)
    @php
    $prezzoFinale = $prezzoFinale + $prezzoDietroScontato;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeDietro}}:</span>
        <p class="tracking-tight text-gray-900">
            <span class="font-bold">€ {{number_format($prezzoDietroScontato, 2)}}</span> <span class="line-through">€ {{number_format($prezzoDietro, 2)}}</span>
        </p>
    </div>
    @else
    @if($prezzoDietro > 0 )
    @php
    $prezzoFinale = $prezzoFinale + $prezzoDietro;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">{{ $nomeDietro}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoDietro, 2)}}
        </p>
    </div>
    @endif
    @endif
    <!-- Prezzo iniziali -->
    @if (strlen($initials) > 0)
    @if ($settings['prezzo_iniziali_tipo'] == 'completo')
    @if ($settings['prezzo_iniziali_completo'] != 0)
    @php
    $prezzoFinale = $prezzoFinale + $settings['prezzo_iniziali_completo'];
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">Iniziali: {{ $initials}}:</span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($settings['prezzo_iniziali_completo'], 2)}}
        </p>
    </div>
    @endif
    @elseif ($settings['prezzo_iniziali_tipo'] == 'lettera')
    @if ($settings['prezzo_iniziali_per_lettera'] != 0)
    @php
    $prezzoIni = $settings['prezzo_iniziali_per_lettera'] * strlen($initials);
    $prezzoFinale = $prezzoFinale + $prezzoIni;
    @endphp
    <div class="flex items-baseline w-full mb-1">
        <span class="mr-1">Iniziali: {{ $initials}} </span>
        <p class="font-bold tracking-tight text-gray-900">
            € {{number_format($prezzoIni, 2)}}
        </p>
    </div>
    @endif
    @endif
    @endif

    <!-- Quantity Selector and Add to Cart -->
    <div class="mt-8 space-y-4">


        
        
        @if (!isset($misure['Tipo misura']))
        <div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50" role="alert">
            <div>
                <span class="font-bold">{{ __('shirt.attention') }}</span> {{ __('shirt.measurement_required') }}
            </div>
        </div>
        @else
        <div class="flex items-center p-4 text-sm text-[var(--theme-accent-color)] border border-[var(--theme-accent-color)]/20 rounded-lg bg-[var(--theme-accent-color)]/10" role="alert">
            <div>
                <span class="font-bold">{{ __('shirt.measurement_method') }}:</span> {{isset($misure['Tipo misura']) ? $misure['Tipo misura'] : ""}}.
            </div>
        </div>
        @endif

        <button class="snipcart-add-item py-3 px-5 w-full item-center text-sm font-medium text-white focus:outline-none rounded-lg transition-colors inline-flex items-center justify-center cursor-pointer {{ !isset($misure['Tipo misura']) ? 'bg-gray-600 cursor-not-allowed' : 'bg-[var(--theme-accent-color)] hover:bg-[var(--theme-accent-color)]/50' }}"
            {{ !isset($misure['Tipo misura']) ? 'disabled' : '' }}
            data-item-id="{{$tessuto->slug}}"
            data-item-price="{{$prezzoBase}}"
            data-item-description="{{$tessuto->descrizione}}"
            data-item-image="{{asset('storage/' . $tessuto->image)}}"
            data-item-name="{{$tessuto->nome}}"
            data-item-url="{{$snipcartUrl}}/fabric/{{$tessuto->slug}}"
            data-item-metadata='{
            "personalizzazioni": {
                "Colletto": "{{ $nomeColletto }}",
                "Manica": "{{ $nomeManica }}",
                "Polsino": "{{ $nomePolsino }}",
                "Fronte": "{{ $nomeFronte }}",
                "Dietro": "{{ $nomeDietro }}",
                "Taschino": "{{ $nomeTaschino }}",
                "Bottone": "{{ $nomeBottone }}",
                "Asola": "{{ $nomeAsola }}",
                "Iniziali": "{{$initials}}",
                "Colore iniziali": "{{$iniColor}}",
                "Stile iniziali": "{{$iniStyle}}",
                "Posizione iniziali": "{{$iniPosition}}"
            },
            "misure": {{json_encode($misure)}}
            }'

            data-item-custom1-name="Accessori"
            data-item-custom1-options="Accessori[{{$prezzoFinale}}]"
            data-item-custom1-type="hidden"

            data-item-quantity="1"

            wire:click="aggiuntoCarrello('{{$tessuto->nome}}')">
            <x-fas-bag-shopping class="w-auto h-4 me-2 -ms-1" />
            {{ __('shirt.add_to_cart') }}
        </button>

    </div>



    <!-- ... existing product details ... -->
    <div class="border-t border-gray-300 pt-6">
        <div class="prose prose-sm text-gray-600">
            {!! str($tessuto->descrizione)->sanitizeHtml() !!}
        </div>
    </div>

</div>
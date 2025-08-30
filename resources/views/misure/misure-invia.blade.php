<div class="p-4 border border-[var(--theme-accent-color)]/20 rounded-lg space-y-4">
    <p>Vuoi duplicare le misure di una camicia in tuo possesso, ma non sai come misurarla correttamente?</p>
    <p>Inviaci la tua camicia ed i nostri esperti la misureranno e conserveranno le tue misure per i prossimi acquisti. Alla tua camicia non verrà arrecato alcun danno e ti verrà rispedita nel modo migliore possibile.</p>
    <p>Invia a:</p>
    <div class="border border-gray-300 rounded-lg bg-white p-6 mb-6 space-y-2">
        <p class="font-bold">{{$settings['company_name']}}</p>
        <p class="font-bold">{{$settings['address']}}</p>
        <p class="font-bold">{{$settings['cap']}} {{$settings['citta']}} ({{$settings['provincia']}})</p>
    </div>

    <div class="flex p-4 mb-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 " role="alert">
        
        <div>
            <span class="font-medium">Quando invii assicurati di includere:</span>
            <ul class="mt-1.5 list-disc list-inside">
                <li>La camicia che vuoi farci misurare</li>
                <li>Il tuo nome</li>
                <li>Un recapito telefonico</li>
                <li>Il tuo indirizzo email</li>
                <li>L'indirizzo di spedizione</li>
                <li>Eventuali istruzioni particolari</li>
            </ul>
        </div>
    </div>

    <button
        wire:click="updateMisureDaInviare()"
        class="text-white bg-[var(--theme-accent-color)] hover:bg-[var(--theme-accent-color)]/80 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer">
        Applica
    </button>

</div>
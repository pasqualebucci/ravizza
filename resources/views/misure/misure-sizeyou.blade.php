<div class="p-4 border border-[var(--theme-accent-color)]/20 rounded-lg space-y-4">

    <div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50" role="alert">
        <img src="{{ asset('images/sizeyou/sizeyou.webp') }}" class="h-12 mr-4" alt="Logo SizeYou">
        <p>
            Prendi le tue misure in modo preciso con l'app SizeYou. Compila il modulo qui sotto per ottenere il codice QR e scaricare l'app gratuitamente.
        </p>
    </div>

@if(session('qrCode'))
    <div class="mt-6 text-center">
        <p class="mb-2 font-medium text-gray-700">Il tuo QR code:</p>
        <img src="data:image/png;base64,{{ session('qrCode') }}" 
             alt="QR Code" class="w-48 h-48 mx-auto">
        
        @if(session('qrLink'))
            <p class="mt-3">
                <a href="{{ session('qrLink') }}" target="_blank" 
                   class="text-blue-600 underline">
                   Vai al link SizeYou
                </a>
            </p>
        @endif
    </div>
@endif


@if($errors->any())
    <div class="mt-4 p-4 bg-red-100 text-red-800 rounded-lg">
        <ul>
            @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(!session('qrCode'))
    <form action="{{ route('sizeyou.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">La tua email</label>
        <input type="email" name="email" id="email"
            value="{{ old('email') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required />
        @error('email')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</span></p>
        @enderror
    </div>

    <div>
        <label for="altezza" class="block mb-2 text-sm font-medium text-gray-900">La tua altezza (cm)</label>
        <input type="number" step="0.1" name="altezza" id="altezza"
            value="{{ old('altezza') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required />
        @error('altezza')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</span></p>
        @enderror
    </div>

    <div>
        <label for="peso" class="block mb-2 text-sm font-medium text-gray-900">Il tuo peso (kg)</label>
        <input type="number" step="0.1" name="peso" id="peso"
            value="{{ old('peso') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required />
        @error('peso')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</span></p>
        @enderror
    </div>

    <div>
        <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Sesso</label>
        <select name="sex" id="sex"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required>
            <option value="male" {{ old('sex') === 'male' ? 'selected' : '' }}>Maschio</option>
            <option value="female" {{ old('sex') === 'female' ? 'selected' : '' }}>Femmina</option>
        </select>
        @error('sex')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</span></p>
        @enderror
    </div>

    <div>
        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Data di nascita</label>
        <input type="date" name="dob" id="dob"
            value="{{ old('dob') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required />
        @error('dob')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</span></p>
        @enderror
    </div>

    <button type="submit"
        class="w-full bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] rounded-lg py-2.5 hover:bg-blue-700">
        Invia
    </button>
</form>
@endif

    
</div>
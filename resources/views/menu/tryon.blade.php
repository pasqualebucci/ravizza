<!-- Disabilita autoDiscover -->
<script>
    if (typeof Dropzone === 'undefined') {
        console.log('Dropzone.js is not loaded!');
    } else {
        Dropzone.autoDiscover = false;
    }
</script>

<nav class="">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 ">
        <li class="me-2">
            <button
                class="inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active">
                <x-heroicon-s-sparkles class="inline-flex items-center justify-center h-5 w-auto mr-1" />Virtual Try-On<span class="inline-flex items-center justify-center w-auto h-4 ms-2 text-xs font-semibold text-[var(--theme-accent-color)] bg-[var(--theme-accent-color)]/10 p-1">Beta</span>
            </button>
        </li>
    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">

    <div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 mb-4" role="alert">
            <div>
                <span class="font-bold">Attenzione!</span> Le immagini sono generate da una IA e sono solo indicative. Verifica sempre le specifiche del prodotto prima dell’acquisto.
            </div>
        </div>

    <p class="text-sm mb-4">Utilizza un nostro modello o carica la tua foto per provare la camicia indossata</p>
    <div class="flex items-center justify-center w-full">

        <div
            x-data="{
                uploadedImage: null,
                async generaPoster(photo) {
                    const modelViewer = document.getElementById('shirtViewer');
    
        
                    // Configura vista frontale ottimale
            modelViewer.cameraOrbit = '0deg 90deg 100%';
            modelViewer.cameraTarget = 'auto auto auto';
            modelViewer.fieldOfView = '28deg';
    
                    // Configura sfondo trasparente
            modelViewer.style.setProperty('--poster-color', 'transparent');
            
            // Attendi stabilizzazione
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            // USA toBlob invece di toDataURL
            const blob = await modelViewer.toBlob({
                mimeType: 'image/webp',
                qualityArgument: 0.98,
                idealAspect: true
            });
// Converti Blob in base64 per Livewire (se necessario)
            const base64 = await this.blobToBase64(blob);
            // Utility functions
    
            
            // Invia a Livewire
            $wire.salvaPoster(base64, photo);
                },
                async blobToBase64(blob) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onloadend = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsDataURL(blob);
        });
    },
            }"
            x-init="
            if (!Dropzone.instances.some(dz => dz.element === $refs.dropzone)) {
            new Dropzone($refs.dropzone, {
            url: '{{ route("upload.dropzone") }}',
            method: 'post',
            paramName: 'file',
            thumbnailWidth: null,
            thumbnailHeight: null,
            maxFiles: 1,
            maxFilesize: 5,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(file, response) {
                this.removeAllFiles();
            uploadedImage = response.path;
            }
        });
    }
    ">

            <form x-ref="dropzone" class="dropzone border border-[var(--theme-accent-color)]/50 border-dashed px-4 py-12 rounded-lg bg-gray-50 dz-clickable text-center text-[var(--theme-accent-color)]" id="file-upload">
                <div class="dz-default dz-message"><button class="dz-button text-sm cursor-pointer" type="button">Trascina qui o fai clic per caricare un immagine</button></div>
            </form>

            <div class="pt-4">
                {{-- Inizio Griglia Immagini --}}
                <div class="grid grid-cols-2 gap-4">

                    <a x-show="uploadedImage" href="#" class="block group relative"
                    @click="
                $wire.setTrayon();
                generaPoster(uploadedImage)"
                    >
                        <img :src="uploadedImage" class="w-full h-auto object-cover rounded-lg group-hover:opacity-75 transition-opacity duration-300">
                        <span class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg text-center">
                            Usa la tua foto
                        </span>
                    </a>

                    <span x-show="!uploadedImage" class="block group">
                        <img src="{{ asset('tryon/modello_0.png') }}" class="w-full h-auto object-cover rounded-lg group-hover:opacity-75 transition-opacity duration-300">
                    </span>

                    <a href="#" class="block group relative"
                    @click="
                $wire.setTrayon();
                generaPoster('modello_1.webp')"
              >
                        <img src="{{ asset('tryon/modello_1.webp') }}" alt="Modello 1" class="w-full h-auto object-cover rounded-lg group-hover:opacity-75 transition-opacity duration-300">
                        <span class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg text-center">
                            Usa questo modello
                        </span>
                    </a>

                    <a href="#" class="block group relative"
                    @click="
                $wire.setTrayon();
                generaPoster('modello_2.webp')"
              >
                        <img src="{{ asset('tryon/modello_2.webp') }}" alt="Modello 2" class="w-full h-auto object-cover rounded-lg group-hover:opacity-75 transition-opacity duration-300">
                        <span class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg text-center">
                            Usa questo modello
                        </span>
                    </a>

                    <a href="#" class="block group relative" @click="
                $wire.setTrayon();
                generaPoster('modello_3.webp')">
                        <img src="{{ asset('tryon/modello_3.webp') }}" alt="Modello 3" class="w-full h-auto object-cover rounded-lg group-hover:opacity-75 transition-opacity duration-300">
                        <span class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg text-center">
                            Usa questo modello
                        </span>
                    </a>

                </div>
                {{-- Fine Griglia Immagini --}}
            </div>
        </div>
    </div>
</div>
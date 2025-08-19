<div id="model-container" class="bg-[var(--theme-bg-model-color)] rounded-lg h-[calc(70vh)] md:h-[calc(100vh-56px)] " wire:ignore>
    <style>
        model-viewer {
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s;
            touch-action: pan-y pinch-zoom;
            --poster-color: transparent;
        }

        model-viewer.scroll-mode {
            pointer-events: none;
        }

        .Hotspot {
            display: block;
            width: 20px;
            height: 20px;
            border-radius: 10px;
            border: none;

            box-sizing: border-box;
            pointer-events: none;
        }

        .Hotspot:not([data-visible]) {
            opacity: 0;
            pointer-events: none;
        }

        .Hotspot[slot="hotspot-initials-Sopra"] {
            --min-hotspot-opacity: 0;

        }

        .Hotspot[slot="hotspot-initials-Centro"] {
            --min-hotspot-opacity: 0;

        }

        .Hotspot[slot="hotspot-initials-Sotto"] {
            --min-hotspot-opacity: 0;

        }

        .Hotspot[slot="hotspot-initials-Polsino"] {
            --min-hotspot-opacity: 0;

        }

        /* This keeps child nodes hidden while the element loads */
        :not(:defined)>* {
            display: none;
        }
    </style>

    <div class="relative h-full  ">


        <!-- Copy Link -->
        <button onclick="navigator.clipboard.writeText(window.location.href).then(() => {
                    const button = this;
                    const originalContent = button.innerHTML;
                    button.innerHTML = `<svg class='w-5 h-5 text-gray-500' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z'/></svg>`;
                    setTimeout(() => {
                        button.innerHTML = originalContent;
                    }, 2000);
                })"
            class="cursor-pointer absolute top-2 right-2 bg-gray-100 p-2 rounded-sm z-19"
            title="Copia Link">
            <x-monoicon-copy class="w-5 h-5 text-gray-500 hover:text-gray-600 transition-colors" />
        </button>
        <!-- Add wishlist -->
        @auth
        <button
            wire:click="saveWishes"
            class="cursor-pointer absolute top-13 right-2 bg-gray-100 p-2 rounded-sm z-19"
            title="Aggiungi alle tue creazioni">
            <x-monoicon-heart class="w-5 h-5 text-gray-500 hover:text-gray-600 transition-colors" />
        </button>
        @endauth
        <!-- Model viewer -->
        <model-viewer id="shirtViewer"
            src="{{ asset('modelli/camicia-aggiornata.glb') }}"
            camera-controls
            tone-mapping="commerce"
            shadow-intensity="0.87"
            touch-action="pan-y"
            loading="lazy"
            camera-orbit="333.33deg 88.69deg 16.99m"
            field-of-view="32.86deg">
        </model-viewer>
        <div id="loadingText" class="loading-text" role="status">
            <svg aria-hidden="true" class="inline w-12 h-12 text-gray-400 animate-spin fill-purple-800" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script type="module" defer>
        const modelViewer = document.querySelector("model-viewer#shirtViewer");
        const loadingText = document.querySelector("#loadingText");

        let isLoading = false;
        let currentTexture = null;
        let materialQueue = [];

        // Enhanced model loading check
        async function waitForModel() {
            return new Promise((resolve) => {
                const checkModel = () => {
                    if (modelViewer.model && modelViewer.modelIsVisible) {
                        resolve();
                    } else {
                        requestAnimationFrame(checkModel);
                    }
                };
                checkModel();
            });
        }

        // Add the missing preloadAssets function
        async function preloadAssets() {
            if (isLoading) return null;

            isLoading = true;
            loadingText.style.opacity = "1";

            try {
                const texture = await modelViewer.createTexture("{{ asset('storage/' . $tessuto->fabric) }}");
                currentTexture = texture;

                const image = await new Promise((resolve, reject) => {
                    const img = new Image();
                    const timeoutId = setTimeout(() => reject(new Error('Image load timeout')), 10000);

                    img.onload = () => {
                        clearTimeout(timeoutId);
                        resolve(img);
                    };
                    img.onerror = () => {
                        clearTimeout(timeoutId);
                        reject(new Error('Failed to load image'));
                    };
                    img.src = "{{ asset('storage/' . $tessuto->fabric) }}";
                });

                return {
                    texture,
                    image
                };
            } catch (error) {
                console.error('Error in preloadAssets:', error);
                throw error;
            } finally {
                isLoading = false;
            }
        }



        // Funzione per creare/aggiornare l'hotspot
        window.updateInitialsHotspot = (initials, color, position, style) => {
            if (!modelViewer || !modelViewer.model) return; // Assicurati che il modello sia caricato

            // Rimuovi hotspot e annotazioni esistenti
            const existingHotspots = modelViewer.querySelectorAll('.initials-hotspot'); // Usa una classe specifica
            existingHotspots.forEach(hotspot => hotspot.remove());

            // Crea l'hotspot SOLO se ci sono iniziali
            if (initials && initials.trim() !== "") {
                const hotspot = document.createElement('button');
                hotspot.classList.add('Hotspot', 'initials-hotspot'); // Aggiungi classe specifica
                hotspot.slot = `hotspot-initials-${position}`; // Slot univoco

                let pos = "0m 1.5m 0.2m"; // Default position
                let norm = "0m 0m 1m"; // Default normal

                // Imposta posizione e normale in base al valore della posizione

                switch (position) {
                    case 'Sopra': // Esempio di slug value
                        pos = "0.24613801104811145m 13.944683713920357m 0.3452938424802534m";
                        norm = "0.11260336467225576m 0.24393228504045075m 0.9632328496160373m";
                        break;
                    case 'Sotto': // Esempio
                        pos = "0.31664459072002343m 9.956928008118902m 0.48757851830472654m";
                        norm = "0.34196762230335453m -0.10237775780494832m 0.9341182687449282m";
                        break;
                    case 'Centro': // Esempio
                        pos = "0.20298998077285219m 12.3283340065631m 0.4238121387295417m";
                        norm = "-0.05272509117602707m -0.006686779962012193m 0.9985866771263372m";
                        break;
                    case 'Polsino': // Esempio
                        pos = "1.891233661434407m 9.500674232872491m -0.02310977301067285m";
                        norm = "0.31732420798712285m 0.04518519480246115m 0.9472400145665348m";
                        break;

                        // Aggiungi altri casi necessari...
                    default:
                        console.warn(`Posizione hotspot non riconosciuta: ${position}`);
                        // Usa valori di default o non creare l'hotspot
                        break; // O return; se non vuoi un hotspot di default
                }
                console.log(pos);
                hotspot.setAttribute('data-position', pos);
                hotspot.setAttribute('data-normal', norm);
                hotspot.setAttribute('data-visibility-attribute', 'visible'); // Per occlusione
                hotspot.style.setProperty('background-color', color || '#FFFFFF');

                // Aggiungi l'hotspot al model-viewer
                modelViewer.appendChild(hotspot);

            }
        }


        // Process material updates in sequence
        async function processMaterialQueue() {
            while (materialQueue.length > 0) {
                const {
                    material,
                    isVisible
                } = materialQueue.shift();
                try {
                    if (!isVisible) {
                        material.setAlphaMode("BLEND");
                        material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
                    } else {
                        material.setAlphaMode("OPAQUE");
                        material.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
                    }
                    await new Promise(resolve => setTimeout(resolve, 10));
                } catch (error) {
                    console.warn(`Error processing material ${material.name}:`, error);
                }
            }
        }

        modelViewer.addEventListener('load', async () => {
            try {
                await waitForModel();

                // Clear previous state
                materialQueue = [];

                const assets = await preloadAssets();
                if (!assets) return;

                const {
                    texture,
                    image
                } = assets;

                // Recupera i valori iniziali passati da Livewire/PHP
                let initialInitials = @json($initials);
                let initialColor = @json($iniColor);
                let initialPosition = @json($iniPosition);
                let initialStyle = @json($iniStyle);

                // Chiama la funzione per creare l'hotspot iniziale
                window.updateInitialsHotspot(initialInitials, initialColor, initialPosition, initialStyle);

                // Your existing material variables
                let CollarMaterial = @json($currentCollarMaterial);
                let ManicaMaterial = @json($currentManicaMaterial);
                let PolsinoMaterial = @json($currentPolsinoMaterial);
                let Taschino = @json($currentTaschino);
                let TaschinoMaterial = @json($currentTaschinoMaterial);
                let ButtonColor = @json($currentButtonColor);
                let AsolaColor = @json($currentAsolaColor);

                let FronteMaterial = @json($currentFronteMaterial);
                let CurrentFronte = @json($currentFronte);
                let CurrentDietro = @json($currentDietro);
                let DietroMaterial = @json($currentDietroMaterial);


                const materials = modelViewer.model.materials;

                for (const material of materials) {
                    const {
                        baseColorTexture
                    } = material.pbrMetallicRoughness;
                    material.pbrMetallicRoughness.setRoughnessFactor(0.8);

                    // Skip texture for buttons, holes and cufflinks
                    if (!material.name.includes('asola') &&
                        !material.name.includes('button')) {

                        const scaleU = 7000 / (image.width);
                        const scaleV = 7000 / (image.height);

                        // Use the cached texture
                        await material.pbrMetallicRoughness.baseColorTexture.setTexture(texture);

                        const sampler = material.pbrMetallicRoughness.baseColorTexture.texture.sampler;

                        sampler.setScale({
                            u: scaleU,
                            v: scaleV
                        });
                    }

                    // Check material visibility
                    const checkMaterialVisibility = (materialName) => {
                        // Check collar and base collar materials
                        if (materialName.includes('colletto')) {
                            // Check if it's the selected collar
                            if (materialName === CollarMaterial) return true;

                            // Check base collar types
                            if (materialName === 'colletto_base_alta' && CollarMaterial.includes('alt')) return true;
                            if (materialName === 'colletto_base' && !CollarMaterial.includes('alt')) return true;

                            // Check button-down specific elements
                            if (CollarMaterial.includes('botton_down')) {
                                if (materialName === 'button_colletto_botton_down' ||
                                    materialName === 'asola_colletto_botton_down') return true;
                            }

                            // Check base collar buttons and holes
                            if (CollarMaterial.includes('alt')) {
                                if (materialName === 'button_colletto_base_alta' ||
                                    materialName === 'asola_colletto_base_alta') return true;
                            } else {
                                if (materialName === 'button_colletto_base' ||
                                    materialName === 'asola_colletto_base') return true;
                            }

                            return false;
                        }

                        // Check sleeve and cuff materials
                        if (materialName.includes('manica')) {
                            if (materialName === ManicaMaterial) return true;
                            // Check manica pleated specific elements
                            if (ManicaMaterial.includes('pleated')) {
                                if (materialName === 'button_manica_pleated' ||
                                    materialName === 'asola_manica_pleated') return true;
                            }
                            return false;
                        }

                        // Handle cuffs visibility based on sleeve type
                        if (materialName.includes('polsino')) {
                            if (ManicaMaterial === 'manica_lunga') {
                                // Show selected cuff
                                if (materialName === PolsinoMaterial) return true;

                                // Show corresponding buttons and buttonholes based on cuff type
                                if (materialName === `button_${PolsinoMaterial}` ||
                                    materialName === `asola_${PolsinoMaterial}`) return true;

                            }
                            return false;
                        }

                        // front materials
                        if (materialName === FronteMaterial) return true;
                        if (materialName.includes('front')) {
                            if (materialName.includes('button_front') || materialName.includes('asola_front')) {
                                // Only show front buttons and buttonholes when FronteMaterial is not 'front_1'
                                if (CurrentFronte == '1') return true;
                            }
                        }

                        // Back materials
                        if (materialName.includes('dietro')) {

                            const dietroNum = parseInt(CurrentDietro);

                            if (dietroNum === 1 && (materialName === 'dietro_1')) return true;
                            if (dietroNum === 2 && (materialName === 'dietro_2')) return true;
                            if (dietroNum === 3 && (materialName === 'dietro_3')) return true;

                            return false;
                        }
                        if (materialName.includes('yoke')) {

                            const dietroNum = parseInt(CurrentDietro);

                            if (dietroNum === 1 && (materialName === 'yoke_1')) return true;
                            if (dietroNum === 2 && (materialName === 'yoke_2')) return true;
                            if (dietroNum === 3 && (materialName === 'yoke_3')) return true;

                            return false;
                        }


                        // Pocket materials
                        if (materialName.includes('tasca')) {
                            // Convert Taschino to number to ensure proper comparison
                            const taschinoNum = parseInt(Taschino);

                            if (taschinoNum === 2 && materialName === 'tasca_1L') return true;
                            if (taschinoNum === 3 && (materialName === 'tasca_1L' || materialName === 'tasca_1R')) return true;
                            if (taschinoNum === 4 && materialName === 'tasca_2L') return true;
                            if (taschinoNum === 5 && (materialName === 'tasca_2L' || materialName === 'tasca_2R')) return true;
                            if (taschinoNum === 6 && materialName === 'tasca_3L') return true;
                            if (taschinoNum === 7 && (materialName === 'tasca_3L' || materialName === 'tasca_3R')) return true;
                            return false;
                        }

                        return false;
                    };



                    // Prima controlla la visibilità e poi applica i colori appropriati o rende trasparente
                    if (!checkMaterialVisibility(material.name)) {
                        material.setAlphaMode("BLEND");
                        material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]); // RGBA: trasparente
                    } else {
                        // Se è visibile, applica il colore appropriato per bottoni, asole e gemelli
                        if (material.name.includes('button')) {
                            material.pbrMetallicRoughness.setRoughnessFactor('0.6');
                            material.pbrMetallicRoughness.setBaseColorFactor(ButtonColor);
                        } else if (material.name.includes('asola')) {
                            material.pbrMetallicRoughness.setRoughnessFactor('0.6');
                            material.pbrMetallicRoughness.setBaseColorFactor(AsolaColor);

                        }
                    }
                }

                modelViewer.style.opacity = "1";
                loadingText.style.opacity = "0";
            } catch (error) {
                console.error('Error loading textures:', error);
            }
        });
    </script>
</div>
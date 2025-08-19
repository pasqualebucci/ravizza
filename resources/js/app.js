import "./bootstrap";

// aggiorna colletti
window.Livewire.on("clickColletto", (id) => {
    let item = id[0];
    let buttonColor = id[1] || [1, 1, 1, 1]; // Colore di default per i bottoni
    let asolaColor = id[2] || [1, 1, 1, 1]; // Colore di default per le asole

    const modelViewer = document.querySelector("#shirtViewer");
    if (!modelViewer || !modelViewer.model) return;

    // Determina il tipo di base
    const baseType = item.includes("alt")
        ? "colletto_base_alta"
        : "colletto_base";

    // Nascondi tutti i materiali colletto
    const materials = modelViewer.model.materials;
    materials.forEach((material) => {
        if (material.name.includes("colletto")) {
            material.setAlphaMode("BLEND");
            material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
        }
    });

    // Mostra il colletto selezionato
    const selectedCollar = modelViewer.model.getMaterialByName(item);
    if (selectedCollar) {
        selectedCollar.setAlphaMode("OPAQUE");
        selectedCollar.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

        // Gestisci bottoni e asole per botton-down
        if (item.includes("botton_down")) {
            const buttonElements = [
                "button_colletto_botton_down",
                "asola_colletto_botton_down",
            ];
            buttonElements.forEach((elementName) => {
                const element =
                    modelViewer.model.getMaterialByName(elementName);
                if (element) {
                    element.setAlphaMode("OPAQUE");
                    if (elementName.includes("button")) {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            buttonColor
                        );
                    } else {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            asolaColor
                        );
                    }
                }
            });
        }

        // Mostra la base collo e i relativi bottoni/asole
        const baseCollo = modelViewer.model.getMaterialByName(baseType);
        if (baseCollo) {
            baseCollo.setAlphaMode("OPAQUE");
            baseCollo.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

            const buttonHolePairs =
                baseType === "colletto_base_alta"
                    ? ["button_colletto_base_alta", "asola_colletto_base_alta"]
                    : ["button_colletto_base", "asola_colletto_base"];

            buttonHolePairs.forEach((elementName) => {
                const element =
                    modelViewer.model.getMaterialByName(elementName);
                if (element) {
                    element.setAlphaMode("OPAQUE");
                    if (elementName.includes("button")) {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            buttonColor
                        );
                    } else {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            asolaColor
                        );
                    }
                }
            });
        }
    }
});

// aggiorna maniche
window.Livewire.on("clickManica", (id) => {
    let item = id[0];
    let buttonColor = id[1];
    let asolaColor = id[2];
    let currentPolsino = id[3];

    const modelViewer = document.querySelector("#shirtViewer");
    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;
    materials.forEach((material) => {
        if (
            material.name.includes("manica") &&
            !material.name.includes("button") &&
            !material.name.includes("asola")
        ) {
            material.setAlphaMode("BLEND");
            material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
        }
    });

    const selectedManica = modelViewer.model.getMaterialByName(item);
    if (selectedManica) {
        selectedManica.setAlphaMode("OPAQUE");
        selectedManica.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

        // Handle cuff visibility based on sleeve type
        const cuffElements = [
            currentPolsino,
            `button_${currentPolsino}`,
            `asola_${currentPolsino}`,
        ];
        if (item.includes("manica_corta") || item.includes("manica_pleated")) {
            // Hide cuff and its elements for short sleeve or pleated sleeve
            cuffElements.forEach((elementName) => {
                const element =
                    modelViewer.model.getMaterialByName(elementName);
                if (element) {
                    element.setAlphaMode("BLEND");
                    element.pbrMetallicRoughness.setBaseColorFactor([
                        0, 0, 0, 0,
                    ]);
                }
            });
        } else if (item === "manica_lunga") {
            // Show cuff and its elements for long sleeve
            cuffElements.forEach((elementName) => {
                const element =
                    modelViewer.model.getMaterialByName(elementName);
                if (element) {
                    element.setAlphaMode("OPAQUE");
                    if (elementName.includes("button")) {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            buttonColor
                        );
                    } else if (elementName.includes("asola")) {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            asolaColor
                        );
                    } else {
                        element.pbrMetallicRoughness.setBaseColorFactor([
                            1, 1, 1, 1,
                        ]);
                    }
                }
            });
        }

        // Handle buttons and holes per manica pleated
        if (item.includes("manica_pleated")) {
            const buttonElements = [
                "button_manica_pleated",
                "asola_manica_pleated",
            ];
            buttonElements.forEach((elementName) => {
                const element =
                    modelViewer.model.getMaterialByName(elementName);
                if (element) {
                    element.setAlphaMode("OPAQUE");
                    if (elementName.includes("button")) {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            buttonColor
                        );
                    } else {
                        element.pbrMetallicRoughness.setBaseColorFactor(
                            asolaColor
                        );
                    }
                }
            });
        } else {
            // Make pleated sleeve buttons and holes transparent
            const pleatedElements = [
                "button_manica_pleated",
                "asola_manica_pleated",
            ];
            pleatedElements.forEach((elementName) => {
                const element =
                    modelViewer.model.getMaterialByName(elementName);
                if (element) {
                    element.setAlphaMode("BLEND");
                    element.pbrMetallicRoughness.setBaseColorFactor([
                        0, 0, 0, 0,
                    ]);
                }
            });
        }
    }
});

// aggiorna polsino
window.Livewire.on("clickPolsino", (id) => {
    const modelViewer = document.querySelector("#shirtViewer");

    let item = id[0];
    let buttonColor = id[1];
    let asolaColor = id[2];

    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;
    materials.forEach((material) => {
        if (
            material.name.startsWith("polsino_") ||
            material.name.includes("button_polsino") ||
            material.name.includes("asola_polsino")
        ) {
            material.setAlphaMode("BLEND");
            material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
        }
    });

    const selectedPolsino = modelViewer.model.getMaterialByName(item);
    if (selectedPolsino) {
        selectedPolsino.setAlphaMode("OPAQUE");
        selectedPolsino.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

        // Handle regular cuff buttons and buttonholes
        const buttonElements = [`button_${item}`, `asola_${item}`];

        buttonElements.forEach((elementName) => {
            const element = modelViewer.model.getMaterialByName(elementName);

            if (element) {
                element.setAlphaMode("OPAQUE");
                if (
                    elementName.includes("button") ||
                    elementName.includes("gemello")
                ) {
                    element.pbrMetallicRoughness.setBaseColorFactor(
                        buttonColor
                    );
                } else if (elementName.includes("asola")) {
                    element.pbrMetallicRoughness.setBaseColorFactor(asolaColor);
                }
            }
        });
    }
});

// aggiorna fronte
window.Livewire.on("clickFronte", (id) => {
    const modelViewer = document.querySelector("#shirtViewer");

    let item = String(id[0]);
    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;

    // Hide/show front buttons and buttonholes based on selection
    const frontElements = ["button_front", "asola_front"];
    frontElements.forEach((elementName) => {
        const element = modelViewer.model.getMaterialByName(elementName);
        if (element) {
            if (item !== "1") {
                element.setAlphaMode("BLEND");
                element.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
            } else {
                element.setAlphaMode("OPAQUE");
                element.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
            }
        }
    });
});

// aggiorna dietro
window.Livewire.on("clickDietro", (id) => {
    const modelViewer = document.querySelector("#shirtViewer");

    let item = String(id[0]);
    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;

    // Define which materials should be visible for each selection
    const visibilityMap = {
        1: {
            dietro: "dietro_1",
            yoke: "yoke_1",
        },
        2: {
            dietro: "dietro_2",
            yoke: "yoke_2",
        },
        3: {
            dietro: "dietro_3",
            yoke: "yoke_3",
        },
    };

    const selectedMaterials = visibilityMap[item];

    materials.forEach((material) => {
        if (
            material.name.startsWith("dietro_") ||
            material.name.startsWith("yoke_")
        ) {
            const isVisible =
                material.name === selectedMaterials.dietro ||
                material.name === selectedMaterials.yoke;

            if (!isVisible) {
                material.setAlphaMode("BLEND");
                material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
            } else {
                material.setAlphaMode("OPAQUE");
                material.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
            }
        }
    });
});

// aggiorna taschino
window.Livewire.on("clickTaschino", (id) => {
    const modelViewer = document.querySelector("#shirtViewer");

    let item = String(id[0]);
    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;

    // First hide all pockets
    materials.forEach((material) => {
        if (material.name.includes("tasca")) {
            material.setAlphaMode("BLEND");
            material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
        }
    });

    // Function to show a pocket
    const showPocket = (pocketName) => {
        const pocket = modelViewer.model.getMaterialByName(pocketName);
        if (pocket) {
            pocket.setAlphaMode("OPAQUE");
            pocket.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
            console.log("Pocket shown:", pocketName); // Debug log
        } else {
            console.log("Pocket not found:", pocketName); // Debug log
        }
    };

    // Show pockets based on item value
    switch (item) {
        case "2":
            showPocket("tasca_1L");
            break;
        case "3":
            showPocket("tasca_1L");
            showPocket("tasca_1R");
            break;
        case "4":
            showPocket("tasca_2L");
            break;
        case "5":
            showPocket("tasca_2L");
            showPocket("tasca_2R");
            break;
        case "6":
            showPocket("tasca_3L");
            break;
        case "7":
            showPocket("tasca_3L");
            showPocket("tasca_3R");
            break;
    }
});

// aggiorna asola
window.Livewire.on("clickAsola", (id) => {
    const modelViewer = document.querySelector("#shirtViewer");
    let item = String(id[0]);
    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;
    materials.forEach((material) => {
        if (material.name.includes("asola")) {
            material.pbrMetallicRoughness.setBaseColorFactor(item);
        }
    });
});

// aggiorna bottone
window.Livewire.on("clickBottone", (id) => {
    const modelViewer = document.querySelector("#shirtViewer");
    let item = String(id[0]);
    if (!modelViewer || !modelViewer.model) return;

    const materials = modelViewer.model.materials;
    materials.forEach((material) => {
        if (material.name.includes("button")) {
            material.pbrMetallicRoughness.setBaseColorFactor(item);
        }
    });
});


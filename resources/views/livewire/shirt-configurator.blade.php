<div class="pt-14" x-data="{ 
    updateCamera(orbit, fov) {
        const viewer = document.querySelector('#shirtViewer');
        viewer.cameraOrbit = orbit;
        viewer.cameraTarget = '0m 14.3m auto';
    }
}">
    @include('components.header')
    <div class="flex flex-col md:flex-row h-auto md:h-[calc(100vh-3.75rem)]">
        <div class="hidden lg:flex lg:flex-col lg:w-1/4 relative px-4 " wire:loading.class="opacity-50">
            @include('kit.kit')

            
        </div>

        <div class="relative flex-1 w-full md:w-2/3 lg:w-2/4 px-4  lg:px-0">

            <div class="sticky top-[56px] {{$vistainterna === '3d' ? '' : 'hidden'}}">
                @include('components.model')
            </div>

            <div class="sticky top-[56px] {{$vistainterna === 'tryon' ? '' : 'hidden'}}">
                @include('components.tryon')
            </div>

        </div>

        <div class="relative md:w-1/3 lg:w-1/4 min-w-[200px]  p-4 ">
            <div class="sticky top-[80px] ">
                @include('components.dettaglio')
            </div>

        </div>
    </div>
</div>
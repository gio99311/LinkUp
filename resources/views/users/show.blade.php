<x-layout>

    <div class="container-fluid w-100 px-0">
        
        <div class="row justify-content-center bg-color-a text-center py-4">
            <div class="col-12 ">
                <h1 class="display-1">Profilo di {{ Auth::user()->name }}</h1>
            </div>
        </div>
        
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <livewire:user-profile />
            </div>
        </div>
        

    </div>
</x-layout>
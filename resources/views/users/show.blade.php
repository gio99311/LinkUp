<x-layout>
        <!-- Modal -->
    <div class="modal fade" id="profileUpdatedModal" tabindex="-1" aria-labelledby="profileUpdatedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profilo aggiornato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                Il tuo profilo è stato aggiornato con successo!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid w-100 px-0">
        
        <div class="row justify-content-center bg-color-a text-center py-4">
            <div class="col-12 ">
                <h1 class="display-1">Profilo di {{ Auth::user()->name }}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-8 ">
                {{-- @if (session()->has('edit_message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition class="alert      alert-success">
                        {{ session('edit_message') }}
                    </div>
                @endif --}}
            </div>
        </div>
        
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <livewire:user-profile />
            </div>
        </div>
        

    </div>
</x-layout>
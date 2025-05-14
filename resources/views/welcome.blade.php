<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-color-a">
                <h1 class="display-1 text-center">LinkUp</h1>
                
            </div>
        </div>
        <div class="row vh-100">
            @auth    
                <livewire:homepage />
            @endauth

            @guest
            <div class="col-12 col-md-6 bg-color-q d-flex flex-column justify-content-center align-items-center position-relative">
                <h2 class="display-1 fw-bold color-t">
                    Racchiudi il tuo mondo in un solo link.
                </h2>
                <h3 class="color-t ">Più di 70 milioni tra creator, influencer e aziende hanno scelto Linktree per trasformare la bio in una vetrina potente. Un unico link per connettere il tuo pubblico a tutto ciò che conta: contenuti, prodotti, collaborazioni e piattaforme social.</h3>
                <a href="{{route('register')}}" class="button-64 position-absolute bottom-0 end-0 m-3"><span class="text text-center">Registrati</span></a>
            </div>
            @endguest
        </div>
    </div>
</x-layout>
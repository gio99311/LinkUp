<x-layout>
    <div class="mt-4 container-fluid">
        <div class="row justify-content-center align-item-center">
            <div class="col-12 col-md-5 text-center">
                <h2 class="display-3 color-q font-semibold">{{ $user->name }}</h2>
                <p class="color-a text-center my-4">{{ $user->bio }}</p>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-4">
                @if($links->isEmpty())
                    <p class="color-p text-center">Nessun link disponibile</p>
                @else
                    <div class="d-flex flex-column justify-content-center align-item-center">
                        @foreach ($links as $link)
                            <a href="{{ $link->url }}" target="_blank" class="border-cust bg-color-b color-a text-center text-decoration-none mb-3">
                                {{ $link->category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        @auth
            
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-5 d-flex flex-column justify-content-center align-items-center">
                <button class="border-0 rounded-5 mt-3 px-2 py-1 " onclick="copyPageUrl()"><span><i class="bi bi-copy color-q"> Copia link del tuo profilo</i></span></button>
                <div id="copyMessage" style="display:none;" class="color-b fw-bold rounded-1 bg-color-q mt-2">
                    Link copiato negli appunti!
                </div>
                <button class="border-0 rounded-5 mt-3 px-2 py-1 color-b" onclick="window.history.back()"><span><i class="bi bi-arrow-return-left color-b"></i> Torna indietro</i></span></button>
            </div>
        </div>
        @endauth
    </div>
</x-layout>
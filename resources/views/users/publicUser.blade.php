<x-layout>
    <div class="mt-4">
        <div class="d-flex flex-column align-items-center w-100">
            <h2 class="display-3 color-q font-semibold">{{ $user->name }}</h2>
            <p class="color-a text-center">{{ $user->bio }}</p>
        </div>

        <div class="d-flex flex-column align-items-center">
            @if($links->isEmpty())
                <p class="color-p text-center">Nessun link disponibile</p>
            @else
                <div class="d-flex flex-column align-items-center w-100">
                    @foreach ($links as $link)
                        <a href="{{ $link->url }}" target="_blank" class="border-cust bg-color-b color-a text-center text-decoration-none w-25 mb-3">
                            {{ $link->category->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="d-flex flex-column align-items-center w-100">
            <button class="border-0 rounded-5 mt-3 px-2 py-1 w-25" onclick="copyPageUrl()"><span><i class="bi bi-copy color-q"> Copia link del tuo profilo</i></span></button>
            <div id="copyMessage" style="display:none;" class="color-b fw-bold">
                Link copiato negli appunti!
            </div>
        </div>
    </div>
</x-layout>
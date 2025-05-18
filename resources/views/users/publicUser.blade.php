<x-layout>
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-xl font-semibold">{{ $user->name }}</h1>
        <p class="text-gray-600">{{ $user->bio }}</p>

        <div class="mt-6 space-y-3">
            @if($links->isEmpty())
                <p>Nessun link disponibile</p>
            @else
                <div class="d-flex flex-column align-items-center">
                    @foreach ($links as $link)
                        <a href="{{ $link->url }}" target="_blank" class="btn btn-outline-primary m-2">
                            {{ $link->category->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <button class="border-0 rounded-5 mt-3 px-2 py-1 w-100" onclick="copyPageUrl()"><span><i class="bi bi-copy color-q"> Copia link del tuo profilo</i></span></button>
        <div id="copyMessage" style="display:none;" class="color-b fw-bold">
            Link copiato negli appunti!
        </div>
    </div>
</x-layout>
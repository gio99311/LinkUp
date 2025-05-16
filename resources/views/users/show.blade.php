<x-layout>
    <div class="container-fluid p-5 bg-color-a text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Profilo di {{ $user->name }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <livewire:user-profile />
            </div>
        </div>
        
        
        
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
</x-layout>
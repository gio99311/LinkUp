<div>
    <div class="container-fluid p-5">
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition class="alert      alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        <div class="row justify-content-center align-items-center card p-md-5 shadow">
            <div class="col-12 mb-3 d-flex flex-column justify-content-center">
                
                <h2 class="text-center color-b display-4 fw-700 my-4">Seleziona le tue categorie</h2>
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 d-flex flex-wrap justify-content-center">
                        @foreach ($categories as $category)
                        <button type="button" class="border-0 rounded-1 mb-3 mx-2 px-3 py-2" wire:click="toggleInput({{ $category->id }})">
                            <i class="bi bi-{{ $category->icons }} color-q fs-4"></i>
                        </button>
                        @endforeach
                    </div>
                </div>
                    
                <div class="row justify-content-center align-items-center">    
                    <div class="col-12 mt-4">
                        @foreach ($categories as $category)
                        @if(!empty($visibleInputs[$category->id]))
                        <div class="row justify-content-center align-items-center mb-3">
                            <div class="col-sm-2 col-auto ">
                                <i class="bi bi-{{ $category->icons }} color-q fs-4"></i>
                            </div>
                            <div class="col-sm-8 col-auto p-1 p-md-3">
                                <input type="text" class="form-control @error("links.$category->id") is-invalid @enderror" placeholder="Inserisci il link per {{ $category->name }}"
                                wire:model.live="links.{{ $category->id }}">
                                @error("links.$category->id")
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2 col-auto p-0 p-md-3">
                                <button type="button" class="btn btn-danger" wire:click="deleteLink({{ $category->id }})"><i class="bi bi-trash3"></i></button>
                            </div>
                            
                        </div>
                        
                        @endif
                        @endforeach
                        
                        @if($changes)
                        <div class="mb-3 d-flex flex-column justify-content-center">
                            <button type="button" class="bg-color-t text-success border-0 rounded-5 mt-3 px-2 py-1 my-1 w-100" wire:click="saveLinks">Salva</button>
                            <a class="bg-light border-0 rounded-5 mt-3 px-2 py-1 my-1 w-100 text-decoration-none text-center color-q" href="{{route('users.publicUser', Auth::user()->name)}}">
                            <i class="bi bi-view-stacked"> Vedi anteprima del tuo profilo</i></a>
                        </div>
                        @endif
                    </div>
                </div>    
                
                
            </div>
            
            
        </div>
    </div>
    

    
</div>

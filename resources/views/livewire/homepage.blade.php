<div>
    <div class="container">
        <div class="row justify-content-center align-items-center bg-color-b vh-100">
            <div class="col-12 col-md-6">
                @if (session()->has('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition class="alert      alert-success">
                    {{ session('message') }}
                </div>
                @endif
                
                <div class="card p-5 shadow">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="col-12">
                            
                            <div class="col-12 d-flex flex-wrap justify-content-around px-3">
                                @foreach ($categories as $category)
                                <button type="button" class="border-0 rounded-1 mb-3 mx-2 px-3 py-2" wire:click="toggleInput({{ $category->id }})">
                                    <i class="bi bi-{{ $category->icons }} color-q fs-4"></i>
                                </button>
                                @endforeach
                            </div>
                            
                            
                            <div class="col-12 mt-4">
                                @foreach ($categories as $category)
                                @if(!empty($visibleInputs[$category->id]))
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <i class="bi bi-{{ $category->icons }} color-q fs-4"></i>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control @error("links.$category->id") is-invalid @enderror" placeholder="Inserisci il link per {{ $category->name }}"
                                        wire:model.live="links.{{ $category->id }}">
                                        @error("links.$category->id")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger" wire:click="deleteLink({{ $category->id }})">Rimuovi</button>
                                    </div>
                                </div>
                                
                                @endif
                                @endforeach
                                
                                @if($changes)
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="button" class="btn btn-success" wire:click="saveLinks">Salva</button>
                                </div>
                                @endif
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
                
                
            </div>
        </div>
    </div>  
    
</div>

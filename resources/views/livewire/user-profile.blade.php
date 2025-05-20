<div>
    
    <form class="p-5 " wire:submit.prevent="updateProfile">

        <div class="mb-3">
            <label for="name" class="form-label display-5 fw-bold color-q">Username</label>
            <input type="text" class="form-control border-cust" id="name" wire:model="username" placeholder="{{Auth::user()->name}}">
            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
            
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label display-5 fw-bold color-q">Biografia</label>
            <textarea wire:model="bio" class="form-control border-cust" rows="3" id="bio" placeholder="Scrivi qualcosa su di te..."></textarea>
            @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

         <div class="row justify-content-center align-items-center">
            <h5 class="display-5 fw-bold color-q my-4">Link Social</h5>
            <div class="col-12 d-flex flex-wrap justify-content-center border-cust bg-color-b p-5">
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
                        
                    
            </div>
        </div>    
       
        <div class="mb-3 d-flex flex-column justify-content-center align-items-center w-100">
            <button class="border-0 rounded-5 mt-3 px-2 py-1  my-1 w-100" type="submit">
                <i class="bi bi-pen color-b"> Aggiorna il tuo profilo</i>
            </button>
           
            <a class="bg-light border-0 rounded-5 mt-3 px-2 py-1 my-1 w-100 text-decoration-none text-center color-q" href="{{route('users.publicUser', Auth::user()->name)}}">
            <i class="bi bi-view-stacked"> Vedi anteprima del tuo profilo</i></a>

        </div>

       

        
    </form>


  

                       
</div>

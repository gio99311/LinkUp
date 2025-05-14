<div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form wire:submit.prevent="updateUsername">
              <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" wire:model="username">
                        <button class="btn btn-outline-secondary" type="submit">Aggiorna</button>
                    </div>
                </form>
                <form class="card p-5 shadow" wire:submit.prevent="{{$showInput ? 'saveInputs' : 'showInputs'}}">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description">
                    </div>
                    @if($showInput)
                    @foreach ($categories as $category)
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-{{$category->icons}}">
                        </i>
                    </button>
                    @endforeach
                    @endif
                    <div class="mb-3 d-flex justify-content-center flex-column aling-items-center">
                        <button type="submit" class="button-64"><span class="text">Aggiungi Link</span></button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>   
</div>

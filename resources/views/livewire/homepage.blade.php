<div>
    <div class="container">
        <div class="row justify-content-center align-items-center bg-color-b vh-100">
            <div class="col-12 col-md-6">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition class="alert      alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form class="card p-5 shadow" wire:submit.prevent="updateUsername">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" wire:model="username" placeholder="{{Auth::user()->name}}">
                        <button class="border-0 rounded-5 mt-3 px-2 py-1 " type="submit">
                            <i class="bi bi-pen color-b">Aggiorna</i>
                        </button>
                    </div>
                </form>
                <form class="card p-5 shadow" wire:submit.prevent="{{$showInput ? 'saveInputs' : 'showInputs'}}">
                    <div class="mb-3 d-flex justify-content-center">
         
                        <div class="col-12 d-flex flex-wrap justify-content-around px-3">
                            @if($showInput)
                            @foreach ($categories as $category)

                            <button class="border-0 rounded-1 mt-3 px-4 py-3" >
                                <i class="bi bi-{{$category->icons}} color-q">
                                </i>
                            </button>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center flex-column aling-items-center">
                        <button type="submit" class="button-64"><span class="text">Aggiungi Link</span></button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>  
    
    <script>
        document.querySelectorAll('.icon-button').forEach(button => {
            button.addEventListener('click', function () {
                const wrapper = this.closest('.icon-wrapper');
                const input = wrapper.querySelector('.link-input');
                input.classList.toggle('d-none');
                input.focus();
            });
        });
    </script>

</div>

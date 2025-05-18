<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-color-a">
                <h1 class="display-1 text-center">LinkUp</h1>
                
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 bg-color-b">
                @auth    
                    <livewire:homepage />
                @endauth
            </div>
        </div>
        <div class="row d-flex justify-content-center vh-100">
            @guest
            <div class="col-12 col-md-6 bg-color-q d-flex flex-column justify-content-center align-items-center position-relative">
                <h2 class="display-1 fw-bold color-t">
                    Lorem ipsum dolor sit, amet 
                </h2>
                <h3 class="color-t mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus expedita reprehenderit neque distinctio et ipsa illum consectetur facere, ad quibusdam sequi, necessitatibus alias nihil consequatur ratione, ipsam laborum architecto. Libero</h3>
                <a href="{{route('register')}}" class="button-64 position-absolute bottom-0 end-0 m-3"><span class="text text-center">Registrati</span></a>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/008/530/024/small_2x/smartphone-cutout-file-png.png" alt="">
            </div>

            @endguest
        </div>
    </div>
</x-layout>
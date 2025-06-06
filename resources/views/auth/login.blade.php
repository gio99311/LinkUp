<x-layout>
    <div class="container-fluid p-5 text-center bg-color-a">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Accedi</h1>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('login') }}" method="POST" class="card p-5 shadow">
                @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-denger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <span class="text-denger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-center flex-column aling-items-center">
                        <button type="submit" class="button-64"><span class="text">Accedi</span></button>
                        <p class="mt-2">Non sei registrato? <a href="{{ route('register') }}" class="text-secondary">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

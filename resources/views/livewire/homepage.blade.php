<div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="card p-5 shadow">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description">
                    </div>
                        <div class="input-group">
                            <select class="selectpicker" data-live-search="true" id="category" aria-label="Default select example">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($categories as $category)
                                <option data-content="<i class='bi bi-{{$category->icons}}'></i>">
                                
                                    {{$category->name}}
                               
                                </option>
                                @endforeach
                                
                            </select>
                        </div>
                    <div class="mb-3 d-flex justify-content-center flex-column aling-items-center">
                        <button type="submit" class="button-64"><span class="text">Aggiungi Link</span></button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>   
</div>

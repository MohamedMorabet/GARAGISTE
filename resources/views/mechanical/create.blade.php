@php   
  $name = old('name');
  $email = old('email');
  $password = old('password');
  $address = old('adress');
  $phone = old('phone');
@endphp

<x-master title="| Create mechanical">
    @vite(['resources/css/role.css'])
  <form action="{{ route('mechanical_store') }}" method="POST" class="my-5">
    @csrf
    <h3 class="text-center text-primary mb-4">Create mechanical</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="mb-3">
                            <label for="name" class="form-label text-primary fs-5">Nom complet</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Entrez votre nom" >
                            @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="adress" class="form-label text-primary fs-5">adress</label>
                            <input type="text" class="form-control" name="adress" value="{{ old('adress') }}" placeholder="Entrez votre adresse" >
                            @error('adress')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="form-label text-primary fs-5">phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Entrez votre phone" >
                            @error('phone')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-primary fs-5">Adresse email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Entrez votre adresse email" >
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-primary fs-5">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" >
                            @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label text-primary fs-5">Confirmation du mot de passe</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe" >
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label text-primary fs-5">role</label>
                            <div class="radio-input">
                                <input value="mechanical" name="role" id="mechanical" type="radio" checked>
                                <label for="mechanical">mechanical</label>
                              </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    
</x-master>
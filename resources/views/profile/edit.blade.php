<x-master title="| update profile">
    <style>
        input {
            border: 2px solid #e1e9ef; /* Light blue border */
            border-radius: 5px;        /* Rounded corners */
            padding: 10px;             /* Space inside the input */
            font-size: 16px;           /* Larger font size */
            transition: border-color 0.3s ease; /* Smooth transition for border color */
        }

        input:focus {
            border-color: #0e507b; /* Darker blue on focus */
            outline: none;         /* Remove default focus outline */
        }
    </style>
    <section class="w-100 px-4 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9">
                <div class="card" style="border-radius: 15px; width: 100%;">
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                     alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <form action="{{ route('profiles.update', $profile->id) }}" method="POST" id="profileForm">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $profile->name }}" autofocus>
                                    <div class="d-flex justify-content-start rounded-3 p-3 mb-3 bg-body-tertiary">
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">Email</p>
                                            <input type="text" name="email" id="email" value="{{ $profile->email }}">
                                        </div>
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">Role</p>
                                            <select name="role" id="">
                                                <option value="admin" @if($profile->role == 'admin') selected @endif>admin</option>
                                                <option value="client" @if($profile->role == 'client') selected @endif>client</option>
                                                <option value="mechanical" @if($profile->role == 'mechanical') selected @endif>mechanical</option>
                                            </select>
                                        </div>
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">Phone</p>
                                            <input type="text" name="phone" id="phone" value="{{ $profile->phone }}">
                                        </div>
                                    </div>
                                    <div class="me-3">
                                        <p class="small text-muted mb-1">adress</p>
                                        <input type="text" name="adress" id="adress" value="{{ $profile->adress }}">
                                        <br>
                                        <div class="d-flex pt-1">
                                            <button type="button" class="btn btn-secondary" onclick="togglePasswordFields()" id="togglePasswordButton">Change Password too?</button>
                                        </div>
                                        <div id="passwordFields" style="display: none;">
                                            <div class="me-3 mt-3">
                                                <p class="small text-muted mb-1">Password</p>
                                                <input type="password" name="password" id="password" value="{{ $profile->password }}">
                                            </div>
                                            <div class="me-3">
                                                <p class="small text-muted mb-1">Confirm Password</p>
                                                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ $profile->password }}">
                                            </div>
                                        </div>
                                        <div class="d-flex pt-1">
                                            <button type="submit" class="btn btn-outline-primary me-1 flex-grow-1">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function togglePasswordFields() {
            var passwordFields = document.getElementById('passwordFields');
            var toggleButton = document.getElementById('togglePasswordButton');
            var password = document.getElementById('password');
            var passwordConfirmation = document.getElementById('password_confirmation');
            
            if (passwordFields.style.display === 'none') {
                passwordFields.style.display = 'block';
                toggleButton.textContent = 'you have to change it now or reload page';
                password.value = '';
                passwordConfirmation.value = '';
            } 
        }
    </script>
</x-master>

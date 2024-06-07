<x-master>
<x-slot name="title">
    @lang('profile : '.$profile->name)
</x-slot>
    <style>
        input {
            border: 2px solid #e1e9ef;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #0e507b;
            outline: none;
        }
    </style>
    <section class="w-100 px-4 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9 ">
                <div class="card" style="border-radius: 15px; width: 100%;">
                    <div class="card-body p-4">
                        <!-- Profile Information -->
                        <div id="profileInfo">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="https://i.pinimg.com/564x/8d/ff/49/8dff49985d0d8afa53751d9ba8907aed.jpg"
                                         alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-3">{{ $profile->name }}</h5>
                                    <p class="mb-3 pb-2">{{ $profile->bio }}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-3 mb-3 bg-body-tertiary">
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">@lang('email')</p>
                                            <p class="mb-0">{{ $profile->email }}</p>
                                        </div>
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">@lang('role')</p>
                                            <p class="mb-0">{{ $profile->role }}</p>
                                        </div>
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">@lang('phone')</p>
                                            <p class="mb-0">{{ $profile->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="me-3">
                                        <p class="small text-muted mb-1">@lang('adress')</p>
                                        <p class="mb-0">{{ $profile->adress }}</p>
                                    </div>
                                    <div class="d-flex pt-1">
                                        <button type="button" class="btn btn-outline-primary me-1 flex-grow-1" onclick="toggleEdit(true)">@lang('edit')</button>
                                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">@lang('delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Form -->
                        <div id="editForm" style="display: none;">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('profiles.update', $profile->id) }}" method="POST" id="profileForm">
                                @csrf
                                @method('PUT')
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="https://i.pinimg.com/564x/8d/ff/49/8dff49985d0d8afa53751d9ba8907aed.jpg"
                                             alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <input type="text" name="name" value="{{ $profile->name }}" autofocus>
                                        <div class="d-flex justify-content-start rounded-3 p-3 mb-3 bg-body-tertiary">
                                            <div class="me-3">
                                                <p class="small text-muted mb-1">@lang('email')</p>
                                                <input type="text" name="email" id="email" value="{{ $profile->email }}">
                                            </div>
                                            <div class="me-3">
                                                <p class="small text-muted mb-1">@lang('role')</p>
                                                <select name="role" id="">
                                                    <option value="admin" @if($profile->role == 'admin') selected @endif>@lang('admin')</option>
                                                    <option value="client" @if($profile->role == 'client') selected @endif>@lang('client')</option>
                                                    <option value="mechanical" @if($profile->role == 'mechanical') selected @endif>@lang('mechanical')</option>
                                                </select>
                                            </div>
                                            <div class="me-3">
                                                <p class="small text-muted mb-1">@lang('phone')</p>
                                                <input type="text" name="phone" id="phone" value="{{ $profile->phone }}">
                                            </div>
                                        </div>
                                        <div class="me-3">
                                            <p class="small text-muted mb-1">@lang('adress')</p>
                                            <input type="text" name="adress" id="adress" value="{{ old('adress') ?? $profile->adress }}">
                                            <div class="d-flex pt-1">
                                                <button type="button" class="btn btn-outline-secondary me-1 flex-grow-1" onclick="togglePasswordFields()" id="togglePasswordButton">@lang('change_password')</button>
                                            </div>
                                            <div id="passwordFields" style="display: none;">
                                                <div class="me-3 mt-3">
                                                    <p class="small text-muted mb-1">@lang('password')</p>
                                                    <input type="password" name="password" id="password" value="{{ $profile->password }}">
                                                </div>
                                                <div class="me-3">
                                                    <p class="small text-muted mb-1">@lang('confirm_password')</p>
                                                    <input type="password" name="password_confirmation" id="password_confirmation" value="{{ $profile->password }}">
                                                </div>
                                            </div>
                                            <div class="d-flex pt-1">
                                                <button type="submit" class="btn btn-outline-primary me-1 flex-grow-1">@lang('update')</button>
                                                <button type="button" class="btn btn-outline-secondary me-1 flex-grow-1" onclick="toggleEdit(false)">@lang('cancel')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <script>
        function toggleEdit(showEdit) {
            document.getElementById('profileInfo').style.display = showEdit ? 'none' : 'block';
            document.getElementById('editForm').style.display = showEdit ? 'block' : 'none';
            localStorage.setItem('isEditing', showEdit);
        }

        function togglePasswordFields() {
            var passwordFields = document.getElementById('passwordFields');
            var toggleButton = document.getElementById('togglePasswordButton');
            
            if (passwordFields.style.display === 'none') {
                passwordFields.style.display = 'block';
                toggleButton.style.display = 'none';
                document.getElementById('password').value = '';
                document.getElementById('password_confirmation').value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var isEditing = localStorage.getItem('isEditing') === 'true';
            toggleEdit(isEditing);
        });
    </script>
</x-master>

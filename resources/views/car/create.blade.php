@php   
  $name = old('name');
  $fuel = old('fuel');
  $password = old('password'); 
@endphp

<x-master title="| mon profile">
  @vite('resources/css/car.css')
  <form action="{{ route('car_store') }}" method="POST" class="my-5" enctype="multipart/form-data">
    @csrf
    <h3 class="text-center text-primary mb-4">Add Car</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div>
                            @if (auth()->user()->role != 'client')
                            <label for="client_id" class="form-label text-primary fs-5">Client</label>
                            <select name="client_id" id="client_id" class="form-select">
                                <option value="" hidden>Select a client</option>
                                @foreach ($Clients as $client)
                                    <option value="{{ $client->id }}" class="form-select" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            @elseif (auth()->user()->role == 'client')
                                <input type="text" class="form-control" name="client_id" value="{{$currentClient->id}}" hidden>
                            @endif
                            @error('client_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="make" class="form-label text-primary fs-5">Car Brand</label>
                            <input type="text" class="form-control" name="make" value="{{ old('make') }}" placeholder="Enter the brand">
                            @error('make')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label text-primary fs-5">Car Model</label>
                            <input type="text" class="form-control" name="model" value="{{ old('model') }}" placeholder="Enter the car model">
                            @error('model')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fuel_type" class="form-label text-primary fs-5">Fuel Type</label>
                            <input type="text" class="form-control" name="fuel_type" value="{{ old('fuel_type') }}" placeholder="Fuel type">
                            @error('fuel_type')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="registration" class="form-label text-primary fs-5">Registration Number</label>
                            <input type="text" class="form-control" name="registration" value="{{ old('registration') }}" placeholder="Enter the registration number">
                            @error('registration')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <h3 class="form-label text-primary fs-5">Images</h3>
                        <div class="mb-3">
                            <label for="photos" class="custum-file-upload">
                                <div class="icon">
                                    <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>Click to upload image</span>
                                </div>
                                <input id="photos" type="file" name="photos" onchange="previewImage(event)">
                            </label>
                            @error('photos')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none;" class="img-thumbnail mt-2" width="150">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>
</x-master>

<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const img = document.getElementById('imagePreview');
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>

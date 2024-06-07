<!-- resources/views/repair/create.blade.php -->
<x-master>
    <x-slot name="title">
        Repair : {{ $car->make }} - {{ $car->model }}
    </x-slot>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-8">
                <div class="card shadow-sm" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h1 class="card-title mb-4">Add Repair for {{ $car->make }} {{ $car->model }}</h1>
                        <form action="{{ route('repairs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Hidden field for car_id -->
                            <input type="hidden" id="car_id" name="car_id" value="{{ $car->id }}">

                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter repair description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">Images (max 4):</label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>

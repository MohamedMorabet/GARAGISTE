<!-- resources/views/charges/create.blade.php -->
<x-master>
    <x-slot name="title">
        Add New Charge
    </x-slot>

    <style>
        .card2 {
            background: transparent;
            opacity: 1;
            backdrop-filter: blur(50px);
        }
    </style>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9">
                <a href="{{ route('repairs.show2', $repair->id) }}" class="btn btn-outline-secondary mb-3">@lang('Back to Repair')</a>
                <div class="card2 shadow-sm" style="border-radius: 15px ">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Add New Charge</h5>
                        <form action="{{ route('charges.store', $repair->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="charge_name" class="form-label">Charge Name</label>
                                <input type="text" name="charge_name" id="charge_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary">Add Charge</button>
                        </form>

                        <a href="{{ route('charges.selectSparePart', $repair->id) }}" class="btn btn-outline-secondary mt-3">Add Spare Part</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>

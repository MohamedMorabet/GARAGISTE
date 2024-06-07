<!-- resources/views/charges/select.blade.php -->
<x-master>
    <x-slot name="title">
        Select Spare Part
    </x-slot>

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9">
                <a href="{{ route('charges.create', $repair->id) }}" class="btn btn-outline-secondary mb-3">@lang('Back to Charge')</a>
                <div class="card shadow-sm" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Select Spare Part</h5>
                        <form action="{{ route('charges.storeSparePart', $repair->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="spare_part_id" class="form-label">Spare Part</label>
                                <select name="spare_part_id" id="spare_part_id" class="form-select" required>
                                    <option value="" disabled selected>Select Spare Part</option>
                                    @foreach($spareParts as $sparePart)
                                        <option value="{{ $sparePart->id }}">{{ $sparePart->name }} ({{ $sparePart->price }} per unit) -- Quantity: {{ $sparePart->quantity }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary">Add Spare Part as Charge</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#spare_part_id').select2({
                placeholder: 'Select Spare Part',
                allowClear: true
            });
        });
    </script>
</x-master>

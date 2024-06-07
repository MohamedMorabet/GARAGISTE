<x-master>
    <x-slot name="title">
        @lang('Add Spare Part')
    </x-slot>
    <style>
        .card {
            /* background: transparent;
            opacity: 1;
            backdrop-filter: blur(1000px); */
            background-color: rgb(201, 244, 244)
        }
    </style>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-8">
                <form action="{{ route('spareParts.import') }}" method="POST" enctype="multipart/form-data" style="display: flex; justify-content: flex-end">
                    @csrf
                    <input type="file" name="file" class="form-control-file" required>
                    <button type="submit" class="btn btn-info">Import from Excel</button>
                </form><br>
                <div class="card shadow-sm" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h1 class="mb-4">@lang('Add Spare Part')</h1>
                        
                        <form action="{{ route('spareParts.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">@lang('Name')</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="reference" class="form-label">@lang('Reference')</label>
                                <input type="text" name="reference" class="form-control" id="reference" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="supplier" class="form-label">@lang('Supplier')</label>
                                <input type="text" name="supplier" class="form-control" id="supplier" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label">@lang('Price')</label>
                                <input type="number" step="0.01" name="price" class="form-control" id="price" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="quantity" class="form-label">@lang('Quantity')</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" required>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">@lang('Add Spare Part')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</x-master>

<x-master>

<x-slot name="title">
    @lang('pieces edit')
</x-slot>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h1>Edit Spare Part</h1>
    <form action="{{ route('spareParts.update', $sparePart->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $sparePart->name }}" required>
        </div>
        <div class="form-group">
            <label for="reference">Reference</label>
            <input type="text" name="reference" class="form-control" value="{{ $sparePart->reference }}" required>
        </div>
        <div class="form-group">
            <label for="supplier">Supplier</label>
            <input type="text" name="supplier" class="form-control" value="{{ $sparePart->supplier }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $sparePart->price }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $sparePart->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Spare Part</button>
    </form>
</div>

</x-master>
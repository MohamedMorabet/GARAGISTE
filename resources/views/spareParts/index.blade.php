<x-master>
    <style>
        table {
            opacity: 1;
            backdrop-filter: blur(100px); /* Adjust the blur radius as needed */
        }
        
    </style>

    <x-slot name="title">
        @lang('pieces')
    </x-slot>

    <body>
        <div class="container">
            <h1>Spare Parts</h1>

            <div class="mt-3 mb-3" style="max-width: 250px">
                <input type="text" id="search" class="" placeholder="Search Spare Parts here..." style="border: none; outline: none; background:transparent;opacity: 1;backdrop-filter: blur(4px);">
            </div>

            <div class="mb-3">
                <a href="{{ route('spareParts.create') }}" class="btn btn-primary">Add a Spare Part</a>
                <a href="{{ route('spareParts.export') }}" class="btn btn-success">Export to Excel</a>
                <form action="{{ route('spareParts.import') }}" method="POST" enctype="multipart/form-data" style="display: flex; justify-content: flex-end">
                    @csrf
                    <input type="file" name="file" class="form-control-file" required>
                    <button type="submit" class="btn btn-info">Import from Excel</button>
                </form>
            </div>

            <table class="table mt-3" id="sparePartsTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Reference</th>
                        <th>Supplier</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spareParts as $sparePart)
                    <tr>
                        <td>{{ $sparePart->name }}</td>
                        <td>{{ $sparePart->reference }}</td>
                        <td>{{ $sparePart->supplier }}</td>
                        <td>{{ $sparePart->price }}</td>
                        <td>{{ $sparePart->quantity }}</td>
                        <td>
                            <a href="{{ route('spareParts.edit', $sparePart->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('spareParts.destroy', $sparePart->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            document.getElementById('search').addEventListener('input', function(e) {
                const query = e.target.value;
                axios.get('{{ route('spareParts.search') }}', { params: { query } })
                    .then(response => {
                        const spareParts = response.data;
                        const tbody = document.querySelector('#sparePartsTable tbody');
                        tbody.innerHTML = '';
                        spareParts.forEach(sparePart => {
                            const tr = document.createElement('tr');

                            tr.innerHTML = `
                                <td>${sparePart.name}</td>
                                <td>${sparePart.reference}</td>
                                <td>${sparePart.supplier}</td>
                                <td>${sparePart.price}</td>
                                <td>${sparePart.quantity}</td>
                                <td>
                                    <a href="/spareParts/${sparePart.id}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/spareParts/${sparePart.id}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            `;
                            tbody.appendChild(tr);
                        });
                    })
                    .catch(error => {
                        console.error('There was an error fetching the spare parts!', error);
                    });
            });
        </script>
    </body>
</x-master>

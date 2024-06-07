<!-- resources/views/repair/history.blade.php -->

<x-master>
    <x-slot name="title">
        @lang('Completed Repairs')
    </x-slot>
    
    @vite(['resources/css/repairs.css'])
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-zinc-700 text-dark d-flex justify-content-between align-items-center">
                <h3>Completed Repairs</h3>
                <a href="{{ route('repairs.list2') }}" >
                    <button class="button">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                        <span>Back</span>
                    </button>
                </a>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>The Car</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $repair)
                            <tr>
                                <td>
                                    @if($repair->car && $repair->car->photos)
                                        <img src="{{ asset('storage/' . $repair->car->photos) }}" alt="Car Photo" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        No photo available
                                    @endif
                                </td>
                                <td>{{ $repair->status }}</td>
                                <td>
                                    @if ($repair->description)
                                    {{$repair->description}}
                                    @else
                                    No description..<img src="https://icon-library.com/images/no-data-icon/no-data-icon-26.jpg" alt="" width="25px" height="25px">
                                    @endif
                                </td>
                                <td>{{ $repair->date_start }}</td>
                                <td>{{ $repair->date_end }}</td>
                                <td>
                                    @if($repair->images)
                                        @foreach($repair->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Repair Image" class="img-thumbnail" style="max-width: 100px;">
                                        @endforeach
                                    @else
                                        No images available
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-master>

<!-- resources/views/repair/historyadmn.blade.php -->
<x-master>
    <x-slot name="title">
        @lang('Completed Repairs')
    </x-slot>
    
    @vite(['resources/css/repairs.css'])
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-zinc-700 text-dark d-flex justify-content-between align-items-center">
                <h3>@lang('Completed Repairs')  / @lang('History')</h3>
                <a href="{{ route('repairs.list') }}" class="btn btn-secondary">@lang('Back')</a>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>@lang('the_car')</th>
                            <th>@lang('mechanical')</th>
                            <th>@lang('status')</th>
                            <th>@lang('description')</th>
                            <th>@lang('date_start')</th>
                            <th>@lang('date_end')</th>
                            <th>@lang('images')</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $repair)
                            <tr>
                                <td>
                                    @if($repair->car && $repair->car->photos)
                                        <img src="{{ asset('storage/' . $repair->car->photos) }}" alt="@lang('car_photo')" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        @lang('no_photo_available')
                                    @endif
                                </td>
                                <td>
                                    @if($repair->mechanical)
                                        {{ $repair->mechanical->name }}
                                    @else
                                        @lang('no_mechanical_assigned')
                                    @endif
                                </td>
                                <td>{{ $repair->status }}</td>
                                <td>
                                    @if ($repair->description)
                                        {{ $repair->description }}
                                    @else
                                        @lang('no_description')<img src="https://icon-library.com/images/no-data-icon/no-data-icon-26.jpg" alt="" width="25px" height="25px">
                                    @endif
                                </td>
                                <td>{{ $repair->date_start }}</td>
                                <td>{{ $repair->date_end }}</td>
                                <td>
                                    @if($repair->images)
                                        @foreach($repair->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="@lang('repair_image')" class="img-thumbnail" style="max-width: 100px;">
                                        @endforeach
                                    @else
                                        @lang('no_images_available')
                                    @endif
                                </td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a href="{{ route('repairs.torepair', $repair->id) }}" class="btn btn-danger mt-3">to repair?</a>
                                        <a href="{{ route('repairs.invoice', $repair->id) }}" class="btn btn-outline-secondary mt-3">Download Invoice</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('repairs.email', $repair->id) }}">Email?</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-master>

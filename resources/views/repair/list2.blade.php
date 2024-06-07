<!-- resources/views/repair/list.blade.php -->
@php
    use Illuminate\Support\Str;
@endphp

<x-master>
    <x-slot name="title">
        @lang('repairs')
    </x-slot>

    @vite(['resources/css/repairs.css'])

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">            {{--add card if you want white back--}}
            <div class="card-header text-dark d-flex justify-content-between align-items-center">
                <h3>@lang('repair_list')</h3>
                <a href="{{ route('repairs.history') }}" class="btn btn-secondary">@lang('History')</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>@lang('the_car')</th>
                            <th>@lang('status')</th>
                            <th>@lang('description')</th>
                            <th>@lang('date_start')</th>
                            <th>@lang('date_end')</th>
                            <th>@lang('images')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $repair)
                        <tr>
                            <form action="{{ route('repairs.updateMechanical', $repair->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="referring_url" value="{{ url()->current() }}">
                                
                                <td>
                                    @if($repair->car && $repair->car->photos)
                                    <img src="{{ asset('storage/' . $repair->car->photos) }}" alt="@lang('car_photo')" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                    @lang('no_photo_available')
                                    @endif
                                </td>
                                <td>
                                    <select name="status" class="form-select">
                                        <option value="" disabled>@lang('select_status')</option>
                                        <option value="pending" {{ $repair->status == 'pending' ? 'selected' : '' }}>@lang('pending')</option>
                                        <option value="in_progress" {{ $repair->status == 'in_progress' ? 'selected' : '' }}>@lang('in_progress')</option>
                                        <option value="completed" {{ $repair->status == 'completed' ? 'selected' : '' }}>@lang('completed')</option>
                                    </select>
                                </td>
                                <td>
                                     @if ($repair->description)
                                    {{Str::limit($repair->description, 50, '')}} <a href="{{ route('repairs.show2', $repair->id) }}" style="">...</a>
                                    @else
                                    @lang('no_description')<a href="{{ route('repairs.show2', $repair->id) }}" style="">...</a><img src="https://icon-library.com/images/no-data-icon/no-data-icon-26.jpg" alt="" width="25px" height="25px">
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
                                    <button type="submit" class="btn btn-secondary">@lang('update')</button>
                                    <a href="{{ route('repairs.show2', $repair->id) }}" class="btn btn-primary">@lang('View')</a>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-master>

<!-- resources/views/repair/listadmn.blade.php -->

<x-master>
    <x-slot name="title">
        @lang('Completed Repairs History')
    </x-slot>

    <body>
        <div class="container mt-5">
            <h2>@lang('completed_repairs_history')</h2>
            <div class="">
                <div class="card-header text-dark">
                    <h3>@lang('repair_list')</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('the_car')</th>
                                <th>@lang('mechanical')</th>
                                <th>@lang('status')</th>
                                <th>@lang('description')</th>
                                <th>@lang('date_start')</th>
                                <th>@lang('date_end')</th>
                                <th>@lang('images')</th>
                                <th>@lang('actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($completedRepairs as $repair)
                                <tr>
                                    <td>{{ $repair->car->name }}</td>
                                    <td>{{ $repair->mechanical->name }}</td>
                                    <td>{{ $repair->status }}</td>
                                    <td>{{ $repair->description }}</td>
                                    <td>{{ $repair->date_start }}</td>
                                    <td>{{ $repair->date_end }}</td>
                                    <td>
                                        {{-- Display images here --}}
                                    </td>
                                    <td>
                                        {{-- Actions (edit, delete, etc.) --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</x-master>

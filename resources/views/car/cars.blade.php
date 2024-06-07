<x-master>
    @vite('resources/css/cars.css')
    <x-slot name="title">
        @lang('cars')
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="wrapper">
        @foreach ($Cars as $car)
        <div class="vehicle-card">
            <div class="details">      
                <div class="thumb-gallery">
                    @if ($car->photos)
                    <img class="first" src="{{ asset('storage/' . $car->photos) }}" />
                    <img class="second" src="{{ asset('storage/' . $car->photos) }}" />
                    @else
                    <h3>No <br>&easter; Images <br>&easter;&easter; founded</h3>
                    @endif
                </div>
                <div class="info">
                    <h3>{{ $car->make }} : {{ $car->model }}</h3>
                    <div class="stars" data-stars="1">
                        @php
                            $randomStars = rand(2, 5);
                        @endphp
                        @for ($i = 1; $i <= $randomStars; $i++)
                        <svg height="22" width="20" class="star rating" data-rating="{{ $i }}">
                            <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                        </svg>
                        @endfor
                    </div>
                    <div class="price">
                        <span>Fuel type</span>
                        <h4>{{ $car->fuel_type }}</h4>
                    </div>
                    <div class="ctas">
                        <form action="{{ route('repairs.create', $car->id) }}" method="GET">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            <button type="submit" class="btn primary">Add to repair</button>
                        </form>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="desc">
                        <p>description: <b>say something</b></p>
                    </div>
                    <div class="specs">
                        <div class="spec mpg">
                            <span>Registration n°</span>
                            <p>{{ $car->registration }}</p>
                        </div>
                        <div class="spec mpg">
                            <span>Owner</span>
                            <p><a style="all: unset; cursor: pointer" href="{{ route('clients.show', $car->client->id) }}">{{ $car->client->name }}</a></p>
                        </div>
                    </div>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btndel">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-master>

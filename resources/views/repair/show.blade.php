<x-master>
    <x-slot name="title">
        Repair Details
    </x-slot>

    <style>
        .img-thumbnail {
            max-width: 200px;
            border-radius: 10px;
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-select, .form-control {
            border: 2px solid #e1e9ef;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-select:focus, .form-control:focus {
            border-color: #0e507b;
            outline: none;
        }

        .btn-outline-secondary {
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: #0e507b;
            border-color: #0e507b;
            color: #fff;
        }

        .add {
            background-color: rgb(133, 126, 182);
            border: 2px solid #e1e9ef;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            margin-bottom: 10px;
            width: auto;
            height: 75px;
        }

        .button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(20, 20, 20);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 0px 4px rgba(180, 160, 255, 0.253);
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
            position: relative;
            color: #e1e9ef
        }

        .svgIcon {
            padding-top: 8px
        }

        .button:hover {
            width: 140px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: rgb(174, 170, 188);
            align-items: center;
        }

        .button:hover .svgIcon {
            transition-duration: 0.3s;
            transform: translateY(-200%);
        }

        .button::before {
            position: absolute;
            bottom: -20px;
            content: "add charges";
            color: white;
            font-size: 0px;
        }

        .button:hover::before {
            font-size: 13px;
            opacity: 1;
            bottom: unset;
            transition-duration: 0.3s;
        }

        .card {
            background: transparent;
            opacity: 1;
            backdrop-filter: blur(50px);
        }
    </style>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9">
                <a href="{{ route('repairs.list2') }}" class="btn btn-outline-secondary mb-3">@lang('Back to List')</a>
                <div class="card shadow-sm" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Repair Details</h5>
                        <a href="{{ route('charges.create', $repair->id) }}">
                            <button class="button">
                                <p class="svgIcon">+</p>
                            </button>
                        </a>
                        <form action="{{ route('repairs.updateMechanical', $repair->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="referring_url" value="{{ url()->current() }}">
                            <div class="d-flex mb-4">
                                <div class="flex-shrink-0">
                                    @if($repair->car && $repair->car->photos)
                                        <img src="{{ asset('storage/' . $repair->car->photos) }}" alt="Car Photo" class="img-fluid img-thumbnail mb-3">
                                    @else
                                        <p>No photo available</p>
                                    @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="" disabled>Select Status</option>
                                            <option value="pending" {{ $repair->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="in_progress" {{ $repair->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $repair->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date Start</label>
                                        <p>{{ $repair->date_start }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date End</label>
                                        <p>{{ $repair->date_end }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <p>{{ $repair->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Images</label>
                                <div style="display: flex; justify-content: space-between">
                                    <div>
                                        @if($repair->images)
                                            @foreach($repair->images as $image)
                                                <img src="{{ asset('storage/' . $image) }}" alt="Repair Image" class="img-fluid img-thumbnail mb-3">
                                            @endforeach
                                        @else
                                            <p>No images available</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-outline-secondary flex-grow-1">Update</button>
                            </div>
                        </form>

                        <!-- Invoice Details -->
                        <h5 class="card-title mt-4">Invoice Details</h5>
                        @if($repair->invoice)
                            <p><strong>Total Price:</strong> ${{ $repair->invoice->total_price }}</p>
                            <h6>Charges</h6>
                            <ul>
                                @foreach($repair->invoice->charges as $charge)
                                    <li>{{ $charge->charge_name }}: ${{ $charge->price }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('repairs.invoice', $repair->id) }}" class="btn btn-outline-secondary mt-3">Download Invoice</a>
                        @else
                            <p>No invoice available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>

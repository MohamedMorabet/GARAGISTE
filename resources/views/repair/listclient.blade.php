<x-master>
    <x-slot name="title">
        @lang('repairs client')
    </x-slot>
    
    @vite(['resources/css/repairs.css'])
    
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-dark text-white" style="display: flex; justify-content: space-between">
                <h3>Current repairs</h3>
                <a href="{{ route('repairs.historyclient') }}" class="btn text-white float-right">View History</a>
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
                            <th>Invoice</th>
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
                            <td>
                                {{ $repair->status }} 
                                @if($repair->status == 'pending')
                                <img src="https://icons.veryicon.com/png/o/business/my-library/pending-disposal-1.png" alt="" width="20px" height="20px"> 
                                @elseif($repair->status == 'in_progress')
                                <img src="https://banner2.cleanpng.com/20180704/hux/kisspng-computer-icons-progress-bar-download-clip-art-speed-icon-5b3c6928538cd7.0191143315306857363422.jpg" alt="" width="20px" height="20px">
                                @elseif($repair->status == 'completed')
                                <img src="https://w7.pngwing.com/pngs/869/958/png-transparent-iphone-6-computer-icons-completion-angle-text-triangle-thumbnail.png" alt="" width="20px" height="20px">
                                @endif
                            </td>
                            <td>
                                @if($repair->description == null)
                                    No description
                                @endif
                                {{ $repair->description }} 
                            </td>
                            <td style="max-width: 160px">
                                @if($repair->date_start == null)
                                Date start not specified Yet.<br> <a href="https://x.com/MohammedElmora8">Contact us</a> for details
                                @else
                                {{ $repair->date_start }} 
                                @endif
                            </td>
                            <td style="max-width: 200px">
                                @if($repair->date_end == null)
                                Date end not specified Yet.<br> <a href="https://x.com/Mohamed___Mrabt">Contact us</a> for details
                                @else
                                {{ $repair->date_end }}
                                @endif
                            </td>
                            <td>
                                @if ($repair->status == 'completed')
                                <a href="{{ route('repairs.invoice', $repair->id) }}" class="btn btn-outline-secondary mt-3">Download Invoice</a>
                                @else 
                                wait for repair to be completed
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <br><br>
</x-master>

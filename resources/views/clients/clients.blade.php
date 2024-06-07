<x-master title="| mon profile">
<h3>Clients</h3>
<div class="row">
    @foreach($Clients as $client)
    <x-client-card :client="$client"/>
    @endforeach
</div>

{{ $Clients->links() }}

</x-master>

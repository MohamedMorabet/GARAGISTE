<x-master title="| mon profile">
<h3>Mechanicals</h3>
<div class="row">
    @foreach($mechanicals as $mechanical)
    <x-mechanical-card :mechanical="$mechanical"/>
    @endforeach
</div>

{{ $mechanicals->links() }}

</x-master>

<x-master title="| mon profile">
<h3>Profiles</h3>
<div class="row">
    @foreach($profiles as $profile)
    <x-profile-card :profile="$profile"/>
    @endforeach
</div>

{{ $profiles->links() }}

</x-master>

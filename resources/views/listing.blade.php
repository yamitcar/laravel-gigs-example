@if($listing == null)
    <p>No listing found</p>
@endif

<h2>
    {{ $listing['title'] }}
</h2>

<p> {{ $listing['description'] }}</p>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Distance</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $location)
        <tr>
            <td>{{ $location->name }}</td>
            <td>{{ $location->lang }} , {{ $location->lat }}</td>
            <td>{{ number_format((float)$location->distance, 2, '.', '') }} Km</td>
        </tr>
        @endforeach
    </tbody>
</table>
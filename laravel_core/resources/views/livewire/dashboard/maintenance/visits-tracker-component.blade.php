<div class="container">
    <h1 class="mt-4">Visits Tracker</h1> 
    <table class="table text-center mt-5">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>User-Agent</th>
                <th>Visited At</th>
            </tr>
        </thead>
        <tbody>
        @if(count($visitorsTracker) > 0)
            @foreach($visitorsTracker as $visit)
                <tr>
                    <td>{{ $visit->id }}</td>
                    <td>{{ $visit->ip }}</td>
                    <td>{{ $visit->user_agent }}</td>
                    <td>{{ $visit->visited_at }}</td>
                </tr>
            @endforeach
        @else
            <td colspan="5">No IPs interceped.</td>
        @endif
        </tbody>
    </table>
    {{ $visitorsTracker->links('pagination::bootstrap-5') }}
</div>

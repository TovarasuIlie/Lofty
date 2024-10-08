<div class="container mb-5">
    <h1 class="mt-4 mb-3">Actiuni recente</h1>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Text</th>
                <th>IP</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userLogs as $log)
            <tr>
                <td>{!! $log->text !!}</td>
                <td>{{ $log->ip }}</td>
                <td>{{ $log->timestamp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $userLogs->links('pagination::bootstrap-5') }}
</div>

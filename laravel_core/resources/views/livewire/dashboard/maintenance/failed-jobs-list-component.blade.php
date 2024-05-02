<div class="container">
    <h1 class="mt-4">All Failed Jobs</h1> 
    <table class="table text-center mt-5">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Connection</th>
                <th>Queue</th>
                <th>Failed At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if(count($failedJobs) > 0)
            @foreach($failedJobs as $failedJob)
                <tr>
                    <td>{{ $failedJob->id }}</td>
                    <td>{{ $failedJob->connection }}</td>
                    <td>{{ $failedJob->queue }}</td>
                    <td>{{ $failedJob->failed_at }}</td>
                    <td>
                        <a href="/dashboard/maintenace/failed-jobs/job/{{ $failedJob->uuid }}" class="btn btn-sm btn-secondary" wire:navigate.hover>See Details</a>
                    </td>
                </tr>
            @endforeach
        @else
            <td colspan="5">Good News, aren't jobs failed!</td>
        @endif
        </tbody>
    </table>
</div>

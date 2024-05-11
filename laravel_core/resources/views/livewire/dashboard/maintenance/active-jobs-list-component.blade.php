<div class="container">
    <h1 class="mt-4">All Active Jobs</h1> 
    <div class="table-responsive">
        <table class="table table-striped text-center mt-5">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Queue</th>
                    <th>Attempts</th>
                    <th>Reserved At</th>
                    <th>Available At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @if(count($activeJobs) > 0)
                    @foreach($activeJobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->queue }}</td>
                            <td>{{ $job->attempts }}</td>
                            <td>{{ $job->reserved_at != null ? Carbon\Carbon::createFromTimestamp($job->reserved_at)->format('H:m d.m.Y') : 'NULL' }}</td>
                            <td>{{ Carbon\Carbon::createFromTimestamp($job->available_at)->format('H:m d.m.Y') }}</td>
                            <td>{{ Carbon\Carbon::createFromTimestamp($job->created_at)->format('H:m d.m.Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Currently aren't jobs active</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

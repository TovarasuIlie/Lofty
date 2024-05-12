<div class="container-fluid">
    <h1 class="mt-4">Mentenanta Lofty</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md">
                <div class="card shadow mb-5 bg-body rounded border-0">
                    <div class="card-header fw-bold fs-4">
                        Made To Measure Stats
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>All new orders:</td>
                                    <td>{{ $newOrders }}</td>
                                </tr>
                                <tr>
                                    <td>All new orders:</td>
                                    <td>{{ $takenOrders }}</td>
                                </tr>
                                <tr>
                                    <td>All finished orders:</td>
                                    <td>{{ $finishedOrders }}</td>
                                </tr>
                                <tr>
                                    <td>Orders Status:</td>
                                    <td>
                                        @if($settings->made_to_measure_closed)
                                            <span class="badge bg-danger me-3">Closed</span>
                                        @else
                                            <span class="badge bg-success me-3">Opened</span>
                                        @endif
                                        <button class="btn btn-sm {{ $settings->made_to_measure_closed ? 'btn-success' : 'btn-danger' }}" wire:click="toggleMadeToMeasure">
                                            {{ $settings->made_to_measure_closed ? 'Open' : 'Close' }}
                                        </button>
                                    </td>   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow mb-5 bg-body rounded border-0">
                    <div class="card-header fw-bold fs-4">
                        Server Jobs Stats
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Active Jobs:</td>
                                    <td class="fw-bold">{{ $activeJobs }}</td>
                                    <td>
                                        <a href="/dashboard/maintenance/active-jobs" class="btn btn-sm btn-info">Show All</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Failed Jobs:</td>
                                    <td class="fw-bold">{{ $failedJobs }}</td>
                                    <td>
                                        <a href="/dashboard/maintenance/failed-jobs" class="btn btn-sm btn-info">Show All</a>
                                    </td>
                                </tr>
                                @can('is-manager')
                                <tr>
                                    <td>Visits Tracker:</td>
                                    <td class="fw-bold">{{ $visitsTracker }} IPs</td>
                                    <td>
                                        <a href="/dashboard/maintenance/visits-tracker" class="btn btn-sm btn-info">Show All</a>
                                    </td>
                                </tr>
                                @endcan
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

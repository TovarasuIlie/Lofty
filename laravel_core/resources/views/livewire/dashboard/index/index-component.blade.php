<div class="container">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row mt-5 mb-3">
        <div class="col-md">
            <div class="card bg-danger bg-gradient border-0 shadow-lg p-1 mb-5 rounded">
                <div class="card-body">
                    <h5 class="card-title">Comenzi noi</h5>
                    <div class="card-text">
                        <table class="table table-borderless">
                            <tr>
                                <td>Comenzi noi azi:</td>
                                <td class="fw-bold">{{ $todayNewOrders }}</td>
                            </tr>
                            <tr>
                                <td>Comenzi noi in total:</td>
                                <td class="fw-bold">{{ $newOrders }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card bg-info bg-gradient border-0 shadow-lg p-1 mb-5 rounded">
                <div class="card-body">
                    <h5 class="card-title">Comenzi Preluate</h5>
                    <div class="card-text">
                        <table class="table table-borderless">
                            <tr>
                                <td>Comenzi preluate azi:</td>
                                <td class="fw-bold">{{ $todayTakenOrders }}</td>
                            </tr>
                            <tr>
                                <td>Comenzi preluate in total:</td>
                                <td class="fw-bold">{{ $takenOrders }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card bg-success bg-gradient border-0 shadow-lg p-1 mb-5 rounded">
                <div class="card-body">
                    <h5 class="card-title">Comenzi Finalizate</h5>
                    <div class="card-text">
                        <table class="table table-borderless">
                            <tr>
                                <td>Comenzi finalizate azi:</td>
                                <td class="fw-bold">{{ $todayFinishedOrders }}</td>
                            </tr>
                            <tr>
                                <td>Comenzi finalizate in total:</td>
                                <td class="fw-bold">{{ $finishedOrders }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card border-0 shadow-lg mb-5 rounded">
                <div class="card-body">
                    <canvas id="viewChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-lg mb-5 rounded">
                <div class="card-header fw-bold">
                    Administratori Online
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach($onlineUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if($user->role_id == App\Models\UserRole::CLIENT)
                                <span class="badge rounded-pill bg-secondary">Client</span>
                                @endif
                                @if($user->role_id == App\Models\UserRole::ADMIN)
                                <span class="badge rounded-pill bg-success">Admin</span>
                                @endif
                                @if($user->role_id == App\Models\UserRole::MANAGER)
                                <span class="badge rounded-pill bg-danger">Manager</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->logged_at)->diffForHumans(now(), Carbon\CarbonInterface::DIFF_ABSOLUTE, true) }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer text-muted">
                    Total: {{ count($onlineUsers) }} administratori online
                </div>
            </div>
        </div>
    </div>
</div>

@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
@endassets
@script
    <script>
        const ctx = document.getElementById('viewChart');
        const visits = $wire.visits;
        const labels = visits.map(item => item.report_day);
        const data = visits.map(item => item.total_visits);
        new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
            label: 'Accesari Unice / 10 min',
            data: data,
            borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });
    </script>
@endscript
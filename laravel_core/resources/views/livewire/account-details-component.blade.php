<div class="container-fluid px-4">
    <h1 class="mt-4">Gestionare Cont {{ $user->name }}</h1>
    <div class="container mt-2 p-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Detalii despre cont
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nume Complet:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Adresa de email:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Cont creat in:</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Roluri:</td>
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
                                </tr>
                                <tr>
                                    <td>Promovat in:</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Admin Area
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center gap-3">
                        <button class="btn btn-sm btn-primary">Editeaza Cont</button>
                        <a href="/dashboard/conturi/gestionare-cont/logs/{{ $user->id }}"
                            class="btn btn-sm btn-secondary">Vizualizare log-uri</a>
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#promote-modal">Promoveaza</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal">Sterge Cont</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
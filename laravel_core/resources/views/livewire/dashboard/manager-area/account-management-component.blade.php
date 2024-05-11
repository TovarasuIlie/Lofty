<div class="container-fluid px-4">
    <h1 class="mt-4 mb-5">Gestionare Conturi</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID Cont</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roluri</th>
                        <th scope="col">Creat La</th>
                        <th scope="col">Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
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
                        <td>{{ $user->created_at}}</td>
                        <td>
                            <a href="/dashboard/conturi/gestionare-cont/{{ $user->id }}" class="btn btn-sm btn-secondary" wire:navigate.hover>Detalii Cont</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
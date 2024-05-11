<div class="container-fluid px-4">
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sterge Utilizator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Esti sigur ca doresti sa stergi utilizatorul <b>{{ $user->name }}</b>? Acceasta actiune este ireversibila!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="deleteUser" type="button" class="btn btn-danger" data-bs-dismiss="modal">Sterge cont!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="promote-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Promovare Utilizator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="changeRole">
                    <div class="modal-body">
                        <div class="form-floating">
                            <select wire:model="roleId" class="form-select" id="role" aria-label="Floating label select example">
                                <option value="0">Alege Rol</option>
                                <option value="1">Client</option>
                                <option value="2">Admin</option>
                                <option value="3">Manager</option>
                            </select>
                            <label for="role">Rolul Utilizatorului</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Seteaza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editeaza Utilizator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="editUser">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input wire:model="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Popescu Ionel" aria-describedby="nameHelp" value="{{ $user->name }}">
                            <label for="name">Nume Complet</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="name@example.com" aria-describedby="emailHelp" value="{{ $user->email }}">
                            <label for="email">Adresa de email</label>
                        </div>
                        @can('is-manager')
                        <div class="form-floating">
                            <input wire:model="ip" type="text" class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" id="ip" placeholder="192.168.0.0" aria-describedby="ipHelp" value="{{ $user->ip }}">
                            <label for="ip">IP</label>
                        </div>
                        @endcan
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Editeaza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h1 class="mt-4">Gestionare Cont {{ $user->name }}</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md mb-3">
                <div class="card shadow mb-5 bg-body rounded border-0">
                    <div class="card-header fw-bold fs-4">
                        Detalii despre cont
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nume Complet:</td>
                                    <td class="fw-bold">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Adresa de email:</td>
                                    <td class="fw-bold">{{ $user->email }}</td>
                                </tr>
                                @can('is-manager')
s
                                @endcan
                                <tr>
                                    <td>Cont creat in:</td>
                                    <td class="fw-bold">{{ $user->created_at }}</td>
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
                                    <td>Ultima editare in:</td>
                                    <td class="fw-bold">{{ $user->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow mb-5 bg-body rounded border-0">
                    <div class="card-header fw-bold fs-4">
                        Admin Area
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center gap-3">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#edit-modal">Editeaza Cont</button>
                        @can('is-manager')
                            <a href="/dashboard/conturi/gestionare-cont/logs/{{ $user->id }}" class="btn btn-sm btn-secondary" wire:navigate>Vizualizare log-uri</a>
                        @endcan
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#promote-modal">Seteaza Rol</button>
                        <button class="btn btn-sm btn-info" wire:click="sendResetPasswordLink">Link Resetare Parola!</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal">Sterge Cont</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
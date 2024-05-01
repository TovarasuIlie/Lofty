<div class="container-fluid px-4">
    <h1 class="mt-4">Creare Link</h1>
    <div class="container mt-2 p-5">
        <div class="container-md mb-5 align-items-center justify-content-center">
            <form wire:submit="generateLink">
                @csrf
                <p>Pentru a crea un nou cont, va trebui sa generezi un link de creare a contului. Pentru
                    a genera link-ul, trebuie ca persoana respectiva sa iti dea o <b>adresa de email
                        valida</b>. Link-ul o sa il primeasca pe email.</b> Link-ul va fi valabil <b>10
                        minute</b>!</b></p>
                <div class="mb-3 w-75 mx-auto">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-square"></i> {{ session('success') }}
                        </div>
                    @endif
                    <div class="form-floating mb-3">
                        <input wire:model="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="name@example.com" aria-describedby="emailHelp">
                        <label for="email">Adresa de email</label>
                    </div>
                    @error('email')<div id="emailHelp" class="form-text text-danger mb-3"><i class="fas fa-exclamation-triangle"></i>  {!! $message !!}</div>@enderror
                    <button wire.loading.class="disabled" type="submit" class="btn btn-outline-black p-3 w-100 fw-bold">
                        <div wire:loading.remove>
                            <i class="fas fa-envelope"></i> Trimite link!
                        </div>
                        <div class="d-none" wire:loading.class.remove="d-none">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                <th scope="col">Email</th>
                <th scope="col">Generat la</th>
                <th scope="col">Generat de</th>
                <th scope="col">Expira la</th>
                <th scope="col">Actiuni</th>
                </tr>
            </thead>
            <tbody>
                @if(count($createdLinks) > 0)
                    @foreach($createdLinks as $link)
                    <tr>
                        <th>{{ $link->email }}</th>
                        <th>{{ $link->generated_by }}</th>
                        <td>{{ $link->generated_at }}</td>
                        <td>{{ $link->expiration_at }}</td>
                        <td>
                            <button wire:click="deleteLink({{ $link->id }})" class="btn btn-sm btn-danger">Sterge Token!</button>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="6">Momentan nu este generat nici un link.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
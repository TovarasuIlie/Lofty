    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body p-4">
                    <img src="{{ asset('/assets/img/dashboard/logo.jpg') }}" alt="" class="img-fluid logo-img img-thumbnail">
                    <h5 class="mb-3 text-center">Inregistrare cont Administrator</h5>
                    <form wire:submit.prevent="register">
                        @csrf
                        <div class="form-floating mb-3">
                            <input wire:model.blur="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Nume...">
                            <label for="name">Nume si Prenumele</label>
                            @error('name')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model.blur="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="name@example.com">
                            <label for="email">Adresa de email</label>
                            @error('email')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                        </div>
                        <div class="form-floating mb-3" style="max-width: 330px;">
                            <input wire:model.blur="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Parola...">
                            <label for="password">Parola</label>
                            @error('password')<span class="text-danger fs-6 text-break"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                        </div>
                        <div class="form-floating mb-3" style="max-width: 330px;">
                            <input wire:model.blur="confirmPassword" type="password" class="form-control {{ $errors->has('confirmPassword') ? 'is-invalid' : '' }}" id="confirm-password" placeholder="Confirma Parola...">
                            <label for="confirm-password">Confirma Parola</label>
                            @error('confirmPassword')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                        </div>
                        @if (session('failed'))
                        <div class="alert alert-danger mb-3" style="max-width: 330px;">
                            <ul>
                                <li><i class="fas fa-exclamation-triangle"></i> {!! session('failed') !!}</li>
                            </ul>
                        </div>
                        @endif
                        <button wire.loading.class="disabled" type="submit" class="btn btn-outline-black p-3 w-100 fw-bold">
                            <div wire:loading.remove>
                                <i class="fas fa-sign-in-alt"></i> Inregistreaza-te!
                            </div>
                            <div class="d-none" wire:loading.class.remove="d-none">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div>
    <div class="container">
        <h1 class="text-uppercase" style="margin-bottom: 100px;">Contact <b>Lofty</b></h1>
        <p>Daca doresti sa iei legatura cu noi, poti completa formularul de mai jos.</p>
        <form class="card card-body shadow p-3 mb-5 bg-body rounded border-0" wire:submit="sendMessage">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input wire:model.blur="firstName" type="text" class="form-control" id="first-name" placeholder="Nume">
                        <label for="first-name">Nume</label>
                        @error('firstName') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input wire:model.blur="lastName" type="text" class="form-control" id="last-name" placeholder="Prenume">
                        <label for="last-name">Prenume</label>
                        @error('lastName') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input wire:model.blur="email" type="text" class="form-control" id="email" placeholder="Prenume">
                <label for="email">Adresa de email</label>
                @error('email') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea wire:model.blur="message" class="form-control" placeholder="Scrie mesajul aici..." id="message" style="height: 100px"></textarea>
                <label for="message">Scrie mesajul aici...</label>
                @error('message') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-square"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('failed'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> {{ session('failed') }}
                </div>
            @endif
            <button wire.loading.class="disabled" type="submit" class="btn btn-outline-black p-3 w-50 mx-auto fw-bold">
                <div wire:loading.remove>
                    <i class="far fa-paper-plane"></i> Trimite mesaj!
                </div>
                <div class="d-none" wire:loading.class.remove="d-none">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Se trimite...
                </div>
            </button>
        </form>
    </div>
</div>

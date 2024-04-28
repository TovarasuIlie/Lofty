    <div class="container">
        <div class="d-flex justify-content-center vh-100 align-items-center">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body p-4">
                    <img src="{{ asset('/assets/img/dashboard/logo.jpg') }}" alt="" class="img-fluid logo-img img-thumbnail">
                    <h5 class="mb-3 text-center">Logare in Panoul de Administrator</h5>
                    <form wire:submit="login">
                        @csrf
                        <div class="form-floating mb-3">
                            <input wire:model.blur="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="email">Adresa de email</label>
                            @error('email') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model.blur="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Password">
                            <label for="password">Parola</label>
                            @error('password') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
                        </div>
                        @if(session('failed'))
                            <div class="alert alert-danger" style="max-width: 330px;">
                                <i class="fas fa-exclamation-triangle"></i> {!! session('failed') !!}
                            </div>
                        @endif
                        <button wire.loading.class="disabled" type="submit" class="btn btn-outline-black p-3 w-100 fw-bold">
                            <div wire:loading.remove>
                                <i class="fas fa-sign-in-alt"></i> Autentifica-te!
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

    <div class="container">
        <div class="d-flex justify-content-center vh-100 align-items-center">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body p-4">
                    <img src="{{ asset('/assets/img/dashboard/logo.jpg') }}" alt="" class="img-fluid logo-img img-thumbnail">
                    <h5 class="mb-3 text-center">Verificare noua locatie</h5>
                    <div class="alert alert-danger" style="max-width: 330px;">
                        <p class="text-break"><i class="fas fa-exclamation-triangle"></i> Deoarece s-a detectat schimbarea locatiei de unde va autentificati in mod obisnuit, va fost trimis un email cu un cod de acces format din 6 caractere, pe email-ul atasat contului. <b>Gresirea repetata a codului, va duce la blocarea contului!</b></p>
                    </div>
                    <form wire:submit="verifyAccount">
                        @csrf
                        <div class="form-floating mb-3">
                            <input wire:model.blur="code" type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" id="code" placeholder="123456" value="{{ old('code') }}">
                            <label for="code">Introdu codul</label>
                            @error('code') <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span> @enderror
                        </div>
                        @if(session('failed'))
                            <div class="alert alert-danger" style="max-width: 330px;">
                                <i class="fas fa-exclamation-triangle"></i> {!! session('failed') !!}
                            </div>
                        @endif
                        <button wire.loading.class="disabled" type="submit" class="btn btn-outline-black p-3 w-100 fw-bold">
                            <div wire:loading.remove>
                                <i class="fas fa-sign-in-alt"></i> Verifica Cont!
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


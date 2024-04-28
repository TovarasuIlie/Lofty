<div class="container" style="font-size: 20px; padding-top: 50px;">
    <h1 class="text-uppercase" style="margin-bottom: 80px;">Ghid de <b>Marimi</b></h1>
    <table class="table text-center">
        <thead class="table-dark">
            <th>Marime</th>
            <th>Bust (CM)</th>
            <th>Talie (CM)</th>
            <th>Sold (CM)</th>
        </thead>
        <tbody>
            <tr>
                <td>S</td>
                <td>86 - 90</td>
                <td>66 - 70</td>
                <td>100 - 104</td>
            </tr>
            <tr>
                <td>M</td>
                <td>90 - 94</td>
                <td>70 - 74</td>
                <td>104 - 108</td>
            </tr>
            <tr>
                <td>L</td>
                <td>94 - 98</td>
                <td>74 - 78</td>
                <td>108 - 112</td>
            </tr>
            <tr>
                <td>XL</td>
                <td>98 - 102</td>
                <td>78 - 82</td>
                <td>112 - 116</td>
            </tr>
            <tr>
                <td>XXL</td>
                <td>102 - 106</td>
                <td>82 - 86</td>
                <td>116 - 120</td>
            </tr>
        </tbody>
    </table><br>
    <p>Poti comanda orice articol de pe site, personalizat pe masurile tale exacte, completand formularul de mai jos. Te
        vom contacta in cel mai scurt pentru ati oferi toate informatiile necesare.</p>
    <h3 class="text-uppercase" style="margin-bottom: 30px;">Date de <b>Contact</b></h3>
    <form class="mb-5" wire:submit="placeOrder">
        @csrf
        <div class="form-floating mb-3">
            <input wire:model.blur="fullname" type="text" class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" id="fullname" placeholder="Popescu Ionel">
            <label for="fullname">Nume si Prenume</label>
            @error('fullname')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input wire:model.blur="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="client@example.com">
                    <label for="email">Adresa de email</label>
                    @error('email')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input wire:model.blur="phoneNumber" type="text" class="form-control {{ $errors->has('phoneNumber') ? 'is-invalid' : '' }}" id="phoneNumber" placeholder="0712312312">
                    <label for="phoneNumber">Numar de telefon</label>
                    @error('phoneNumber')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
            </div>
        </div>
        <h3 class="text-uppercase" style="margin-bottom: 30px; margin-top: 50px;">Masuri <b>Personalizate</b></h3>
        <p><small>Pentru a crea ținuta potrivită/perfectă pentru tine, te rugăm să ne furnizezi măsurile solicitate.
                Pentru orientare, trebuie să urmezi cu exactitate desenul de mai jos. Toate dimensiunile vor fi trecute
                in <b>centimetri (cm).</b></p>
        <div class="row">
            <div class="col-lg">
                <img src="{{ asset('assets/img/made-to-measure.jpg') }}"
                    class="img-fluid rounded mx-auto d-block made-to-measure-img" alt="...">
            </div>
            <div class="col-lg">
                <div class="mb-3">
                    <div class="input-group input-group-sm mx-0 px-0">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="height" type="text" class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" id="height" placeholder="180">
                            <label for="height">1. Inaltime</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('height')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="bustCircumference" type="text" class="form-control {{ $errors->has('bustCircumference') ? 'is-invalid' : '' }}" id="bustCircumference" placeholder="90">
                            <label for="bustCircumference">2. Circumferinta Bustului</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('bustCircumference')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="circuferenceUnderTheBust" type="text" class="form-control {{ $errors->has('circuferenceUnderTheBust') ? 'is-invalid' : '' }}" id="circuferenceUnderTheBust" placeholder="90">
                            <label for="circuferenceUnderTheBust">3. Circumferinta sub bust</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('circuferenceUnderTheBust')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="waistCircumference" type="text" class="form-control {{ $errors->has('waistCircumference') ? 'is-invalid' : '' }}" id="waistCircumference" placeholder="90">
                            <label for="waistCircumference">4. Circumferinta talie</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('waistCircumference')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="hipsCircumference" type="text" class="form-control {{ $errors->has('hipsCircumference') ? 'is-invalid' : '' }}" id="hipsCircumference" placeholder="90">
                            <label for="hipsCircumference">5. Circumferinta solduri</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('hipsCircumference')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="armLength" type="text" class="form-control {{ $errors->has('armLength') ? 'is-invalid' : '' }}" id="armLength" placeholder="90">
                            <label for="armLength">6. Lungime brat</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('armLength')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="insideLengthLeg" type="text" class="form-control {{ $errors->has('insideLengthLeg') ? 'is-invalid' : '' }}" id="insideLengthLeg" placeholder="90">
                            <label for="insideLengthLeg">7. Lungime pe interiorul piciorului</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('insideLengthLeg')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
                <div class="mb-3">
                    <div class="input-group input-group-sm">
                        <div class="form-floating flex-fill">
                            <input wire:model.blur="shoulderWidth" type="text" class="form-control {{ $errors->has('shoulderWidth') ? 'is-invalid' : '' }}" id="shoulderWidth" placeholder="90">
                            <label for="shoulderWidth">8. Latime umeri</label>
                        </div>
                        <span class="input-group-text" id="height">cm</span>
                    </div>
                    @error('shoulderWidth')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
                </div>
            </div>
        </div>
        <h3 class="text-uppercase" style="margin-bottom: 30px; margin-top: 50px;">Imagine <b>Orientativa</b></h3>
        <p><small>Pentru a ne putea face o idee daca masurile primite se potrivesc cu realitatea, va trebuie sa ne
                trimiti o poza cu tine. Aceasta va trebuie sa fie tip portret, in care sa fi prinsa din cap pana in
                picioare. Trebuie sa incarci minim 2 poze.</small></p>
        
        <x-livewire-filepond wire:model="photos" multiple accept="image/*" />
        @error('photos')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror

        <div class="form-check mt-5">
            <input wire:model.live="verifyCheckbox" class="form-check-input {{ $errors->has('verifyCheckbox') ? 'is-invalid' : '' }}" type="checkbox" value="1" id="verifyCheckbox">
            <label class="form-check-label {{ $errors->has('verifyCheckbox') ? 'fw-bold' : '' }}" for="verifyCheckbox">
                Inainte de a plasa comanda, verificati daca toate datele introdu-se sunt corecte. Numarul de telefon si
                Email-ul trebuie sa fie valide, si sa aveti acces la acestea, deoarece prin intermediul lor vom tine
                legatura cu dumneavoastra.
            </label>
            @error('verifyCheckbox')<span class="text-danger fs-6"><i class="fas fa-exclamation-triangle"></i> {!! $message !!}</span>@enderror
        </div><br>
        <center>
            <button type="submit" class="btn btn-outline-black" id="place-order-button">Plaseaza
                Comanda!</button>
        </center>
    </form>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    </script>
</div>
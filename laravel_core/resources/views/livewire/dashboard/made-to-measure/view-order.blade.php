<div class="container-fluid px-4 mb-3">
    @foreach($order->getMedia('made-to-measure') as $photo)
        <div class="modal fade" id="zoom-modal-{{ $photo->id }}" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container">
                            <img src="{{ $photo->getFullUrl() }}" class="rounded mx-auto d-block w-100" id="img-modal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if($order->status == 1)
    <div class="modal fade" id="mark-finished-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status comanda #{{ $order->ID }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esti sigur ca doresti sa schimbi statusul comenzi in <span class="badge bg-success">Comanda Finalizata</span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Inchide</button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" wire:click="setFinishedOrderStatus">Salveaza Status!</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($order->status == 0)
    <div class="modal fade" id="mark-taken-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status comanda #{{ $order->ID }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esti sigur ca doresti sa schimbi statusul comenzi in <span class="badge bg-info">Comanda Preluata</span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Inchide</button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" wire:click="setOrderTakenStatus">Salveasa Status!</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($order->status == 2)
    <div class="modal fade" id="mark-new-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status comanda #{{ $order->ID }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esti sigur ca doresti sa schimbi statusul comenzi in <span class="badge bg-danger">Comanda Noua</span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Inchide</button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" wire:click="setNewOrderStatus">Salveaza Status</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <h1 class="mt-4 mb-5">Detalii comanda ID #{{ $order->id }}</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-5 bg-body rounded border-0">
                    <div class="card-header">
                        <h2 class="text-uppercase">Date de <b>Contact</b></h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Numele si prenumele</td>
                                    <td><b>{{ $order->fullname }}</b></td>
                                </tr>
                                <tr>
                                    <td>Adresa de email</td>
                                    <td><b>{{ $order->email }}</b></td>
                                </tr>
                                <tr>
                                    <td>Numarul de telefon</td>
                                    <td><b>{{ $order->phone_number }}</b></td>
                                </tr>
                                <tr>
                                    <td>Status comanda</td>
                                    <td>
                                        @if($order->status == 0)
                                            <span class="badge bg-danger">Comanda Noua</span>
                                        @endif
                                        @if($order->status == 1)
                                            <span class="badge bg-info">Comanda Preluata</span>
                                        @endif
                                        @if($order->status == 2)
                                            <span class="badge bg-success">Comanda Finalizata</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow mb-5 bg-body rounded border-0">
                    <div class="card-header">
                        <h2 class="text-uppercase">Admin <b>Area</b></h2>
                    </div>
                    <div class="card-body d-flex flex-column gap-3">
                        @if($order->status == 0)
                            <button type="button" data-bs-toggle="modal" data-bs-target="#mark-taken-modal" class="btn btn-sm btn-info">Marcheaza ca "Comanda Preluata"</button>
                        @endif
                        @if($order->status == 1)
                            <button type="button" data-bs-toggle="modal" data-bs-target="#mark-finished-modal" class="btn btn-sm btn-success">Marcheaza ca "Comanda Finalizata"</button>
                        @endif
                        @if($order->status == 2)
                            <button type="button" data-bs-toggle="modal" data-bs-target="#mark-new-modal" class="btn btn-sm btn-danger">Marcheaza ca "Comanda Noua"</button>
                        @endif
                        @can('is-manager')
                        <button class="btn btn-sm btn-danger" wire:click="deleteOrder">Sterge Comanda!</button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-5 bg-body rounded border-0">
            <div class="card-header">
                <h2 class="text-uppercase">Masuri <b>Personalizate</b></h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl">
                        <img src="{{ asset('assets/img/made-to-measure.jpg') }}"
                            class="img-fluid rounded mx-auto d-block made-to-measure-img" alt="...">
                    </div>
                    <div class="col-xl p-5 d-flex justify-content-center align-items-center">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><b>1</b>. Inaltime</td>
                                    <td><b>{{ $order->height}}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>2</b>. Circumferinta Bustului</td>
                                    <td><b>{{ $order->bust_circumference }}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>3</b>. Circumferinta sub bust</td>
                                    <td><b>{{ $order->circumference_under_the_bust }}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>4</b>. Circumferinta talie</td>
                                    <td><b>{{ $order->waist_circumference }}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>5</b>. Circumferinta solduri</td>
                                    <td><b>{{ $order->hips_circumference }}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>6</b>. Lungime brat</td>
                                    <td><b>{{ $order->arm_length }}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>7</b>. Lungime pe interiorul piciorului</td>
                                    <td><b>{{ $order->inside_length_leg }}</b> cm</td>
                                </tr>
                                <tr>
                                    <td><b>8</b>. Latime umeri</td>
                                    <td><b>{{ $order->shoulder_width }}</b> cm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-5 bg-body rounded border-0">
            <div class="card-header">
                <h3 class="text-uppercase">Imagine
                    <b>Orientativa</b>
                </h3>
            </div>
            <div class="card-body">
                <div class="row gap-0" id="order-images">
                    @foreach($order->getMedia('made-to-measure') as $photo)
                        <div class="col">
                            <div class="container container-preview px-0 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#zoom-modal-{{ $photo->id }}">
                                <img src="{{ $photo->getFullUrl('preview') }}" alt="" class="image img-fluid">
                                <div class="overlay rounded">
                                    <div class="text"><i class="fas fa-search-plus"></i></div>
                                </div>
                            </div>
                            @can('is-manager')
                                <table class="table mt-3">
                                    <tr>
                                        <td>Marime poza</td>
                                        <td>{{ $photo->human_readable_size }}</td>
                                    </tr>
                                </table>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h1 class="mt-4 mb-5">Mesajul cu ID #{{ $message->id }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg mb-3">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nume si Prenume:</td>
                                    <td class="fw-bold">{{ $message->fullname }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td class="fw-bold">{{ $message->email }}</td>
                                </tr>
                                @can('is-manager')
                                <tr>
                                    <td>IP:</td>
                                    <td class="fw-bold">{{ $message->ip }}</td>
                                </tr>
                                @endcan
                                <tr>
                                    <td>Trimis in:</td>
                                    <td class="fw-bold">{{ $message->send_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="container">
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @can('is-manager')
            <div class="col-lg-3">
                <div class="card shadow rounded border-0">
                    <div class="card-body d-flex flex-column gap-3">
                        <button class="btn btn-sm btn-danger">Sterge mesaj</button>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>

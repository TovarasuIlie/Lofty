<div class="container-fluid px-4">
    <h1 class="mt-4 mb-5">Comenzi Noi</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID Comanda</th>
                        <th>Nume si prenume</th>
                        <th>Email</th>
                        <th>Numar de telefon</th>
                        <th>Status</th>
                        <th>Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($orders) > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->fullname }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone_number }}</td>
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
                                <td>
                                    <a href="comanda/{{ $order->id }}" wire:navigate.hover>Vezi</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="6">Momentan nu este nici o comanda plasata.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>

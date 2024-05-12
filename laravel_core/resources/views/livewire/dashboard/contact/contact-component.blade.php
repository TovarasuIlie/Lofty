<div class="container-fluid px-4">
    <h1 class="mt-4 mb-5">Mesaje noi</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nume si prenume</th>
                        <th>Email</th>
                        <th>Trimis la</th>
                        <th>Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($messages) > 0)
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->fullname }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->send_at }}</td>
                                <td>
                                    <a href="vezi-mesaj/{{ $message->id }}" wire:navigate>Vezi</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="6">Momentan nu ai nici un mesaj.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $messages->links('pagination::bootstrap-5') }}
    </div>
</div>

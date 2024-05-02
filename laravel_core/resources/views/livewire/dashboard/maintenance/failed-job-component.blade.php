<div class="container">
    <div class="modal fade" id="payload-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payload Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>UUID:</td>
                                <td>{{ $failedJob->payload->uuid }}</td>
                            </tr>
                            <tr>
                                <td>Display Name:</td>
                                <td>{{ $failedJob->payload->displayName }}</td>
                            </tr>
                            <tr>
                                <td>Job:</td>
                                <td>{{ $failedJob->payload->job }}</td>
                            </tr>
                            <tr>
                                <td>Max Tries:</td>
                                <td>{{ $failedJob->payload->maxTries }}</td>
                            </tr>
                            <tr>
                                <td>Max Exceptions:</td>
                                <td>{{ $failedJob->payload->maxExceptions }}</td>
                            </tr>
                            <tr>
                                <td>Fail On Timeout:</td>
                                <td>{{ $failedJob->payload->failOnTimeout }}</td>
                            </tr>
                            <tr>
                                <td>Backoff:</td>
                                <td>{{ $failedJob->payload->backoff }}</td>
                            </tr>
                            <tr>
                                <td>Timeout:</td>
                                <td>{{ $failedJob->payload->timeout }}</td>
                            </tr>
                            <tr>
                                <td>Retry Until:</td>
                                <td>{{ $failedJob->payload->retryUntil }}</td>
                            </tr>
                            <tr>
                                <td>Data:</td>
                                <td class="text-warp text-break">{{ json_encode($failedJob->payload->data) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exception-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Exception Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $failedJob->exception }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Failed Job</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this failed job?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" wire:click="deleteFailedJob">Yes, Im sure!</button>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mt-4">Job Details</h1>
    <div class="row mt-5">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>ID:</td>
                                <td class="fw-bold">{{ $failedJob->id }}</td>
                            </tr>
                            <tr>
                                <td>UUID:</td>
                                <td class="fw-bold">{{ $failedJob->uuid }}</td>
                            </tr>
                            <tr>
                                <td>Connection:</td>
                                <td class="fw-bold">{{ $failedJob->connection }}</td>
                            </tr>
                            <tr>
                                <td>Queue:</td>
                                <td class="fw-bold">{{ $failedJob->queue }}</td>
                            </tr>
                            <tr>
                                <td>Payload:</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-target="#payload-modal" data-bs-toggle="modal">See Payload</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Exception:</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-target="#exception-modal" data-bs-toggle="modal">See Exception</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Failed At:</td>
                                <td class="fw-bold">{{ $failedJob->failed_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body d-flex flex-column gap-3">
                    <button class="btn btn-sm btn-success" wire:click="retryJob">Retry Job</button>
                    <button class="btn btn-sm btn-danger"  data-bs-target="#confirm-modal" data-bs-toggle="modal">Delete Job</button>
                </div>
            </div>
        </div>
    </div>
</div>
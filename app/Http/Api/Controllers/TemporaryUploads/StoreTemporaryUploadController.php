<?php

declare(strict_types=1);

namespace App\Http\Api\Controllers\TemporaryUploads;

use App\Http\Api\Requests\TemporaryUploads\StoreTemporaryUploadRequest;
use App\Http\Api\Responses\MessageResponse;
use App\Jobs\TemporaryUploads\CreateTemporaryUpload;
use Illuminate\Contracts\Bus\Dispatcher;
use Symfony\Component\HttpFoundation\Response;

use function Illuminate\Support\defer;

final readonly class StoreTemporaryUploadController
{
    public function __construct(
        private Dispatcher $bus
    ) {}

    public function __invoke(
        StoreTemporaryUploadRequest $request
    ): MessageResponse {
        defer(
            callback: fn () => $this->bus->dispatch(
                new CreateTemporaryUpload(
                    payload: $request->payload()
                )
            ),
            name: 'create-temporary-upload',
        );

        return new MessageResponse(
            message: 'Temporary upload accepted.',
            status: Response::HTTP_ACCEPTED,
        );
    }
}

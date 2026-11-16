<?php

declare(strict_types=1);

namespace App\Jobs\TemporaryUploads;

use App\Http\Payloads\TemporaryUploads\NewTemporaryUpload;
use App\Models\TemporaryUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

final class CreateTemporaryUpload implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly NewTemporaryUpload $payload
    ) {}

    public function handle(): TemporaryUpload
    {
        return TemporaryUpload::query()->create([
            ...$this->payload->toArray(),
            'status' => 'pending',

            // Short classroom expiry.
            'expires_at' => now()->addMinutes(2),
        ]);
    }
}

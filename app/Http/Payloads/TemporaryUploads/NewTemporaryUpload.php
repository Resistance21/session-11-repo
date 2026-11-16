<?php

declare(strict_types=1);

namespace App\Http\Payloads\TemporaryUploads;

final readonly class NewTemporaryUpload
{
    public function __construct(
        public string $userId,
        public string $originalName,
        public string $mimeType,
        public int $size,
    ) {}

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'original_name' => $this->originalName,
            'mime_type' => $this->mimeType,
            'size' => $this->size,
        ];
    }
}

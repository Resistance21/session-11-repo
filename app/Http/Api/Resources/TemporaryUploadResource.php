<?php

declare(strict_types=1);

namespace App\Http\Api\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class TemporaryUploadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'original_name' => $this->original_name,
            'mime_type' => $this->mime_type,
            'size' => $this->size,
            'status' => $this->status,
            'expires_at' => $this->expires_at?->toIso8601String(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Api\Requests\TemporaryUploads;

use App\Http\Payloads\TemporaryUploads\NewTemporaryUpload;
use Illuminate\Foundation\Http\FormRequest;

final class StoreTemporaryUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'original_name' => ['required', 'string', 'max:255'],
            'mime_type' => ['required', 'string', 'max:255'],
            'size' => ['required', 'integer', 'min:1'],
        ];
    }

    public function payload(): NewTemporaryUpload
    {
        $data = $this->validated();

        return new NewTemporaryUpload(
            userId: (string) $this->user()->id,
            originalName: (string) $data['original_name'],
            mimeType: (string) $data['mime_type'],
            size: (int) $data['size'],
        );
    }
}

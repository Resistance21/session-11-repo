<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasMongoUlidKey;
use MongoDB\Laravel\Eloquent\Model;

final class TemporaryUpload extends Model
{
    use HasMongoUlidKey;

    protected $connection = 'mongodb';

    protected $table = 'temporary_uploads';

    protected $fillable = [
        'user_id',
        'original_name',
        'mime_type',
        'size',
        'status',
        'expires_at',
    ];

    protected $hidden = ['_id'];

    protected function casts(): array
    {
        return [
            'size' => 'integer',
            'expires_at' => 'datetime',
        ];
    }
}

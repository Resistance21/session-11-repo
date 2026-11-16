<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mongodb')
            ->create(
                'temporary_uploads',
                function (Blueprint $collection): void {
                    $collection->index('user_id');

                    $collection->expire(
                        'expires_at',
                        0
                    );
                }
            );
    }

    public function down(): void
    {
        Schema::connection('mongodb')
            ->dropIfExists('temporary_uploads');
    }
};

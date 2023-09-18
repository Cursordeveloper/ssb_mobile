<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'tokens', callback: function (Blueprint $table) {
            // Table ids
            $table->id();
            $table->unsignedBigInteger(column: 'customer_id');

            // Table main attributes
            $table->integer(column: 'token')->unique();
            $table->dateTime(column: 'token_expiration_date');
            $table->boolean(column: 'is_verified')->default(value: false);

            // Foreign key field
            $table->foreign(columns: 'customer_id')->references(columns: 'id')->on(table: 'customers')->onDelete(action: 'cascade');

            // Table timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'tokens');
    }
};

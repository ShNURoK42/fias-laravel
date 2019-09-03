<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания сущности 'EstateStatus'.
 */
class EstateStatus1567520703 extends Migration
{
    /**
     * Создание таблицы 'fias_laravel_estate_status'.
     */
    public function up(): void
    {
        Schema::create('fias_laravel_estate_status', function (Blueprint $table) {
            // создание полей таблицы
            $table->unsignedInteger('eststatid')->nullable(false);
            $table->string('name', 255)->nullable(false);
            // создание индексов таблицы
            $table->primary('eststatid');
        });
    }

    /**
     * Удаление таблицы 'fias_laravel_estate_status'.
     */
    public function down(): void
    {
        Schema::dropIfExists('fias_laravel_estate_status');
    }
}
<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания сущности 'AddressObjectType'.
 */
class AddressObjectType1567520703 extends Migration
{
    /**
     * Создание таблицы 'fias_laravel_address_object_type'.
     */
    public function up(): void
    {
        Schema::create('fias_laravel_address_object_type', function (Blueprint $table) {
            // создание полей таблицы
            $table->unsignedInteger('kodtst')->nullable(false);
            $table->unsignedInteger('level')->nullable(false);
            $table->string('socrname', 255)->nullable(false);
            $table->string('scname', 255)->nullable(false);
            // создание индексов таблицы
            $table->primary('kodtst');
        });
    }

    /**
     * Удаление таблицы 'fias_laravel_address_object_type'.
     */
    public function down(): void
    {
        Schema::dropIfExists('fias_laravel_address_object_type');
    }
}
<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания сущности 'RoomType'.
 */
class FiasLaravelRoomType extends Migration
{
    /**
     * Создание таблицы 'fias_laravel_room_type'.
     */
    public function up(): void
    {
        Schema::create('fias_laravel_room_type', function (Blueprint $table) {
            // создание полей таблицы
            $table->unsignedInteger('rmtypeid')->nullable(false)->primary();
            $table->string('name', 255)->nullable(false);
            $table->string('shortname', 255)->nullable(false);
        });
    }

    /**
     * Удаление таблицы 'fias_laravel_room_type'.
     */
    public function down(): void
    {
        Schema::dropIfExists('fias_laravel_room_type');
    }
}

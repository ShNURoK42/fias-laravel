<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания сущности 'Room'.
 */
class Room1567520703 extends Migration
{
    /**
     * Создание таблицы 'fias_laravel_room'.
     */
    public function up(): void
    {
        Schema::create('fias_laravel_room', function (Blueprint $table) {
            // создание полей таблицы
            $table->string('roomid', 255)->nullable(false);
            $table->string('roomguid', 255);
            $table->string('houseguid', 255);
            $table->string('regioncode', 2)->nullable(false);
            $table->string('flatnumber', 50)->nullable(false);
            $table->unsignedInteger('flattype')->nullable(false);
            $table->string('postalcode', 6)->nullable(false);
            $table->datetime('startdate')->nullable(false);
            $table->datetime('enddate')->nullable(false);
            $table->datetime('updatedate')->nullable(false);
            $table->string('operstatus', 255)->nullable(false);
            $table->string('livestatus', 255)->nullable(false);
            $table->string('normdoc', 255);
            // создание индексов таблицы
            $table->primary('roomid');
        });
    }

    /**
     * Удаление таблицы 'fias_laravel_room'.
     */
    public function down(): void
    {
        Schema::dropIfExists('fias_laravel_room');
    }
}
<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания сущности 'OperationStatus'.
 */
class FiasLaravelOperationStatus extends Migration
{
    /**
     * Создание таблицы 'fias_laravel_operation_status'.
     */
    public function up(): void
    {
        Schema::dropIfExists('fias_laravel_operation_status');
        Schema::create('fias_laravel_operation_status', function (Blueprint $table) {
            // создание полей таблицы
            $table->unsignedInteger('operstatid')->nullable(false)->primary();
            $table->string('name', 255)->nullable(false);
            // настройки таблицы
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Удаление таблицы 'fias_laravel_operation_status'.
     */
    public function down(): void
    {
        Schema::dropIfExists('fias_laravel_operation_status');
    }
}

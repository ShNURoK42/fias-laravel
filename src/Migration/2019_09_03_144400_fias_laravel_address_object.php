<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания сущности 'AddressObject'.
 */
class AddressObject1567520703 extends Migration
{
    /**
     * Создание таблицы 'fias_laravel_address_object'.
     */
    public function up(): void
    {
        Schema::create('fias_laravel_address_object', function (Blueprint $table) {
            // создание полей таблицы
            $table->string('aoid', 255)->nullable(false)->comment('Уникальный идентификатор записи. Ключевое поле.');
            $table->string('aoguid', 255)->comment('Глобальный уникальный идентификатор адресного объекта');
            $table->string('parentguid', 255)->comment('Идентификатор объекта родительского объекта');
            $table->string('previd', 255)->comment('Идентификатор записи связывания с предыдушей исторической записью');
            $table->string('nextid', 255)->comment('Идентификатор записи  связывания с последующей исторической записью');
            $table->string('code', 255)->comment('Код адресного объекта одной строкой с признаком актуальности из КЛАДР 4.0.');
            $table->string('formalname', 255)->nullable(false)->comment('Формализованное наименование');
            $table->string('offname', 255)->nullable(false)->comment('Официальное наименование');
            $table->string('shortname', 255)->nullable(false)->comment('Краткое наименование типа объекта');
            $table->unsignedInteger('aolevel')->nullable(false)->comment('Уровень адресного объекта');
            $table->string('regioncode', 2)->nullable(false)->comment('Код региона');
            $table->string('areacode', 3)->nullable(false)->comment('Код района');
            $table->string('autocode', 1)->nullable(false)->comment('Код автономии');
            $table->string('citycode', 3)->nullable(false)->comment('Код города');
            $table->string('ctarcode', 3)->nullable(false)->comment('Код внутригородского района');
            $table->string('placecode', 4)->nullable(false)->comment('Код населенного пункта');
            $table->string('plancode', 4)->nullable(false)->comment('Код элемента планировочной структуры');
            $table->string('streetcode', 4)->nullable(false)->comment('Код улицы');
            $table->string('extrcode', 4)->nullable(false)->comment('Код дополнительного адресообразующего элемента');
            $table->string('sextcode', 3)->nullable(false)->comment('Код подчиненного дополнительного адресообразующего элемента');
            $table->string('plaincode', 15)->nullable(false)->comment('Код адресного объекта из КЛАДР 4.0 одной строкой без признака актуальности (последних двух цифр)');
            $table->unsignedInteger('currstatus')->nullable(false)->comment('Статус актуальности КЛАДР 4 (последние две цифры в коде)');
            $table->unsignedInteger('actstatus')->nullable(false)->comment('Статус актуальности адресного объекта ФИАС. Актуальный адрес на текущую дату. Обычно последняя запись об адресном объекте');
            $table->unsignedInteger('livestatus')->nullable(false)->comment('Признак действующего адресного объекта');
            $table->unsignedInteger('centstatus')->nullable(false)->comment('Статус центра');
            $table->unsignedInteger('operstatus')->nullable(false)->comment('Статус действия над записью – причина появления записи');
            $table->string('ifnsfl', 4)->nullable(false)->comment('Код ИФНС ФЛ');
            $table->string('ifnsul', 4)->nullable(false)->comment('Код ИФНС ЮЛ');
            $table->string('terrifnsfl', 4)->nullable(false)->comment('Код территориального участка ИФНС ФЛ');
            $table->string('terrifnsul', 4)->nullable(false)->comment('Код территориального участка ИФНС ЮЛ');
            $table->string('okato', 11)->nullable(false)->comment('OKATO');
            $table->string('oktmo', 11)->nullable(false)->comment('OKTMO');
            $table->string('postalcode', 6)->nullable(false)->comment('Почтовый индекс');
            $table->datetime('startdate')->nullable(false)->comment('Начало действия записи');
            $table->datetime('enddate')->nullable(false)->comment('Окончание действия записи');
            $table->datetime('updatedate')->nullable(false)->comment('Дата  внесения (обновления) записи');
            $table->unsignedInteger('divtype')->nullable(false)->comment('Признак адресации');
            // создание индексов таблицы
            $table->primary('aoid');
            $table->index('aoguid');
        });
    }

    /**
     * Удаление таблицы 'fias_laravel_address_object'.
     */
    public function down(): void
    {
        Schema::dropIfExists('fias_laravel_address_object');
    }
}
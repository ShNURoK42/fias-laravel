<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Laravel\LiquetsoftFiasBundle\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Перечень типов комнат.
 *
 * @property int    $rmtypeid
 * @property string $name
 * @property string $shortname
 */
class RoomType extends Model
{
    /** @var string */
    protected $table = 'fias_laravel_room_type';

    /** @var string[] */
    protected $fillable = [
        'rmtypeid',
        'name',
        'shortname',
    ];

    /**
     * @inheritDoc
     */
    public function getIncrementing(): bool
    {
        return false;
    }
}
<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Laravel\LiquetsoftFiasBundle\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Ресурс для сущности 'AddressObject'.
 *
 * @property string      $aoid
 * @property string|null $aoguid
 * @property string|null $parentguid
 * @property string|null $previd
 * @property string|null $nextid
 * @property string|null $code
 * @property string      $formalname
 * @property string      $offname
 * @property string      $shortname
 * @property int         $aolevel
 * @property string      $regioncode
 * @property string      $areacode
 * @property string      $autocode
 * @property string      $citycode
 * @property string      $ctarcode
 * @property string      $placecode
 * @property string      $plancode
 * @property string      $streetcode
 * @property string      $extrcode
 * @property string      $sextcode
 * @property string      $plaincode
 * @property int         $currstatus
 * @property int         $actstatus
 * @property int         $livestatus
 * @property int         $centstatus
 * @property int         $operstatus
 * @property string      $ifnsfl
 * @property string      $ifnsul
 * @property string      $terrifnsfl
 * @property string      $terrifnsul
 * @property string      $okato
 * @property string      $oktmo
 * @property string      $postalcode
 * @property Carbon      $startdate
 * @property Carbon      $enddate
 * @property Carbon      $updatedate
 * @property int         $divtype
 */
class AddressObject extends JsonResource
{
    /**
     * Преобразует сущность 'AddressObject' в массив.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'aoid' => $this->aoid,
            'aoguid' => $this->aoguid,
            'parentguid' => $this->parentguid,
            'previd' => $this->previd,
            'nextid' => $this->nextid,
            'code' => $this->code,
            'formalname' => $this->formalname,
            'offname' => $this->offname,
            'shortname' => $this->shortname,
            'aolevel' => $this->aolevel,
            'regioncode' => $this->regioncode,
            'areacode' => $this->areacode,
            'autocode' => $this->autocode,
            'citycode' => $this->citycode,
            'ctarcode' => $this->ctarcode,
            'placecode' => $this->placecode,
            'plancode' => $this->plancode,
            'streetcode' => $this->streetcode,
            'extrcode' => $this->extrcode,
            'sextcode' => $this->sextcode,
            'plaincode' => $this->plaincode,
            'currstatus' => $this->currstatus,
            'actstatus' => $this->actstatus,
            'livestatus' => $this->livestatus,
            'centstatus' => $this->centstatus,
            'operstatus' => $this->operstatus,
            'ifnsfl' => $this->ifnsfl,
            'ifnsul' => $this->ifnsul,
            'terrifnsfl' => $this->terrifnsfl,
            'terrifnsul' => $this->terrifnsul,
            'okato' => $this->okato,
            'oktmo' => $this->oktmo,
            'postalcode' => $this->postalcode,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'updatedate' => $this->updatedate,
            'divtype' => $this->divtype,
        ];
    }
}
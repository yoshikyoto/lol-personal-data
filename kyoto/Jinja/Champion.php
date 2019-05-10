<?php

namespace SummonersKyoto\Jinja;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    protected $table = 'champion';

    /**
     * 更新不可の属性一覧
     * guarded か fillable はどちから指定しないといけない
     * @var array
     */
    protected $guarded = [];

    public $incrementing = false;

    public static function summon(
        int $id,
        string $name,
        string $iconUrl
    ): void {
        static::updateOrCreate(
            ['id' => $id],
            [
                'id' => $id,
                'name' => $name,
                'icon_url' => $iconUrl,
            ]
        );
    }
}

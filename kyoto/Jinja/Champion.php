<?php

namespace SummonersKyoto\Jinja;

use Illuminate\Database\Eloquent\Model;

/**
 * @see https://readouble.com/laravel/5.8/ja/eloquent.html
 */
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

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    /**
     * DBに保存する。すでに存在する場合は更新する。
     * @param string $key
     * @param string $id
     * @param string $name
     * @param string $iconUrl
     */
    public static function summon(
        string $key,
        string $id,
        string $name,
        string $iconUrl
    ): void {
        static::updateOrCreate(
            ['key' => $key],
            [
                'key' => $key,
                'id' => $id,
                'name' => $name,
                'icon_url' => $iconUrl,
            ]
        );
    }
}

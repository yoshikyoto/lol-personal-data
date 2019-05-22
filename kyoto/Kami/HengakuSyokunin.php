<?php


namespace SummonersKyoto\Kami;


trait HengakuSyokunin
{
    /**
     * Hengakable[] の中身を全部 Array に変換する
     * @param Hengakable[] $targets
     * @return array
     */
    private function hengakuMulti(array $targets): array
    {
        return array_map(function(Hengakable $target) {
            return $target->hengaku();
        }, $targets);
    }
}

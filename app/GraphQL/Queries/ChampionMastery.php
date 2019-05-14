<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SummonersKyoto\Zen\LegendZen;
use SummonersKyoto\Kami\ChampionMastery as KamiChampiomMastery;
use SummonersKyoto\Kami\SummonerName;

class ChampionMasteries
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function resolve(
        $rootValue,
        array $args,
            GraphQLContext $context,
        ResolveInfo $resolveInfo
    ) {
            /**
             * @var LegendZen $zen
             */
            $zen = \App::make(LegendZen::class);
            $summoner = $zen->welcomeSummoner($this->welcomeSummonerName($args));
            $championMasteries = $zen->welcomeChampionMasteries($summoner->getId());

            return array_map(function(KamiChampiomMastery $championMastery) {
                return [
                    'isChestGranted' => $championMastery->isChestGranted(),
                ];
            }, $championMasteries);
    }

    private function welcomeSummonerName(array $args): SummonerName
    {
        return new SummonerName($args['summonerName']);
    }

}

<?php

namespace MlbApi\Models;

class Model
{
    use ModelTrait;
    
    public function __construct(
        public readonly int $id
    ) {
    }

    // public static function fromJson(string $json): ?self {
    //     $jsonDecoded = json_decode($json, true);

    //     if(!is_iterable($jsonDecoded)) {
    //         return null;
    //     }

    //     return self::fromArray($jsonDecoded);
    // }

    // public static function fromArray(array $arr): ?self {
    //     $vars = get_class_vars(self::class);

    //     return new self(...array_intersect_key($arr, $vars));
    // }
}

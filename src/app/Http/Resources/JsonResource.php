<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;
use LogicException;

abstract class JsonResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        // 明示的に属性を列挙
        throw new LogicException('Not yet implemented.');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:27
 */

namespace App\Services;


use App\Repositories\EventTypeRepository;
use App\Serializers\CustomSerializer;
use App\Transformers\EventTypeTransformer;

class EventTypeService
{

    private $eventTypeRepository = null;

    public function __construct(EventTypeRepository $eventTypeRepository)
    {
        $this->eventTypeRepository = $eventTypeRepository;
    }

    public function getAll() {
        $data = $this->eventTypeRepository->getAll();
        return fractal()
            ->collection($data, new EventTypeTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

}
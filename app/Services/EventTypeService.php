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

/**
 * Class EventTypeService
 * @package App\Services
 */
class EventTypeService
{

    /**
     * @var EventTypeRepository|null
     */
    private $eventTypeRepository = null;

    /**
     * EventTypeService constructor.
     * @param EventTypeRepository $eventTypeRepository
     */
    public function __construct(EventTypeRepository $eventTypeRepository)
    {
        $this->eventTypeRepository = $eventTypeRepository;
    }

    /**
     * @return array
     */
    public function getAll() {
        $data = $this->eventTypeRepository->getAll();
        return fractal()
            ->collection($data, new EventTypeTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

}
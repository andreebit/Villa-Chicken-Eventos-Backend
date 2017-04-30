<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:27
 */

namespace App\Services;


use App\Repositories\CustomerRepository;
use App\Repositories\EventTypeRepository;
use App\Repositories\MaterialRepository;
use App\Serializers\CustomSerializer;
use App\Transformers\CustomerTransformer;
use App\Transformers\EventTypeTransformer;
use App\Transformers\MaterialTransformer;
use Mambo\Exceptions\Types\NotFoundException;

/**
 * Class MaterialService
 * @package App\Services
 */
class MaterialService
{

    /**
     * @var null
     */
    private $materialRepository = null;

    /**
     * MaterialService constructor.
     * @param MaterialRepository $materialRepository
     */
    public function __construct(MaterialRepository $materialRepository)
    {
        $this->materialRepository = $materialRepository;
    }

    /**
     * @param $eventTypeId
     * @return array
     */
    public function getByEventType($eventTypeId) {
        $data = $this->materialRepository->getByEventType($eventTypeId);
        return fractal()
            ->collection($data, new MaterialTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

}
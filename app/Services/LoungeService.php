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
use App\Repositories\LoungeRepository;
use App\Serializers\CustomSerializer;
use App\Transformers\CustomerTransformer;
use App\Transformers\EventTypeTransformer;
use App\Transformers\LoungeTransformer;
use Mambo\Exceptions\Types\NotFoundException;

/**
 * Class LoungeService
 * @package App\Services
 */
class LoungeService
{

    /**
     * @var LoungeRepository|null
     */
    private $loungeRepository = null;

    /**
     * LoungeService constructor.
     * @param LoungeRepository $loungeRepository
     */
    public function __construct(LoungeRepository $loungeRepository)
    {
        $this->loungeRepository = $loungeRepository;
    }

    /**
     * @param $localId
     * @return array
     */
    public function getByLocal($localId) {
        $data = $this->loungeRepository->getByLocal($localId);
        return fractal()
            ->collection($data, new LoungeTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

}
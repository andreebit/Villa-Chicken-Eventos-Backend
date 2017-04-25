<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:27
 */

namespace App\Services;


use App\Repositories\ServiceCategoryRepository;
use App\Serializers\CustomSerializer;
use App\Transformers\ServiceCategoryTransformer;

/**
 * Class ServiceCategoryService
 * @package App\Services
 */
class ServiceCategoryService
{

    /**
     * @var ServiceCategoryRepository|null
     */
    private $serviceCategoryRepository = null;

    /**
     * ServiceCategoryService constructor.
     * @param ServiceCategoryRepository $serviceCategoryRepository
     */
    public function __construct(ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepository;
    }

    /**
     * @return array
     */
    public function getAll() {
        $data = $this->serviceCategoryRepository->getAll();
        return fractal()
            ->collection($data, new ServiceCategoryTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

}
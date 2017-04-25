<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:27
 */

namespace App\Services;


use App\Repositories\PackageRepository;
use App\Serializers\CustomSerializer;
use App\Transformers\PackageTransformer;

class PackageService
{

    private $packageRepository = null;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function getAll()
    {
        $data = $this->packageRepository->getAll();
        return fractal()
            ->collection($data, new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    public function getByEventType($eventTypeId)
    {
        $data = $this->packageRepository->getByEventType($eventTypeId);
        return fractal()
            ->collection($data, new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    public function create($data)
    {

    }

    public function update($packageId, $data)
    {

    }

    public function delete($packageId)
    {

    }
    
}
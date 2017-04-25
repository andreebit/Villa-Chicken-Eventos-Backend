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
use Mambo\Exceptions\Types\NotCreatedException;
use Mambo\Exceptions\Types\NotFoundException;

/**
 * Class PackageService
 * @package App\Services
 */
class PackageService
{

    /**
     *
     */
    const MAX_PACKAGES_BY_EVENT_TYPE = 2;

    /**
     * @var PackageRepository|null
     */
    private $packageRepository = null;

    /**
     * PackageService constructor.
     * @param PackageRepository $packageRepository
     */
    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $data = $this->packageRepository->getAll();
        return fractal()
            ->collection($data, new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $eventTypeId
     * @return array
     */
    public function getByEventType($eventTypeId)
    {
        $data = $this->packageRepository->getByEventType($eventTypeId);
        return fractal()
            ->collection($data, new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $packageId
     * @return array
     */
    public function getById($packageId)
    {
        $data = $this->validateExistsById($packageId);
        return fractal()
            ->item($data, new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $data
     * @return array
     */
    public function create($data)
    {

        $this->validateQuantityByEventType($data['event_type_id']);
        $this->validateDuplicateName($data['name']);

        $row = $this->packageRepository->create($data);
        return fractal()
            ->item($this->packageRepository->getById($row->id), new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $packageId
     * @param $data
     * @return array
     */
    public function update($packageId, $data)
    {

        $row = $this->validateExistsById($packageId);

        if (isset($data['event_type_id']) && !empty($data['event_type_id'])) {
            $this->validateQuantityByEventType($data['event_type_id'], $packageId);
        }

        if (isset($data['name']) && !empty($data['name'])) {
            $this->validateDuplicateName($data['name'], $packageId);
        }

        $this->packageRepository->update($row->id, $data);
        return fractal()
            ->item($this->packageRepository->getById($row->id), new PackageTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $packageId
     * @return bool
     */
    public function delete($packageId)
    {
        $this->validateExistsById($packageId);
        return $this->packageRepository->delete($packageId);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    private function validateExistsById($id)
    {
        $row = $this->packageRepository->getById($id);
        if (is_null($row)) {
            throw new NotFoundException(trans('exception.package_not_found'));
        }

        return $row;
    }

    /**
     * @param $name
     * @param null $id
     * @return bool
     * @throws NotCreatedException
     */
    private function validateDuplicateName($name, $id = null)
    {
        $row = $this->packageRepository->getByName($name);
        if (!is_null($row)) {
            if (!is_null($id) && $row->id == $id) {
                return false;
            }

            throw new NotCreatedException(trans('exception.package_name_already_registered'));
        }

        return false;
    }

    /**
     * @param $eventTypeId
     * @param null $id
     * @return int
     * @throws NotCreatedException
     */
    private function validateQuantityByEventType($eventTypeId, $id = null)
    {
        if (!is_null($id)) {
            $row = $this->packageRepository->getById($id);
            if ($row->event_type_id != $eventTypeId) {
                $result = $this->packageRepository->getByEventType($eventTypeId);
            } else {
                $result = $this->packageRepository->getByEventType($row->event_type_id);
            }
        } else {
            $result = $this->packageRepository->getByEventType($eventTypeId);
        }

        if (count($result) >= self::MAX_PACKAGES_BY_EVENT_TYPE) {
            throw new NotCreatedException(trans('exception.package_count_limit_registered'));
        }

        return count($result);
    }

}
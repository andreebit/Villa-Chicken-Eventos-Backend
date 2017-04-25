<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\Package;
use App\Repositories\Contracts\CrudRepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mambo\Exceptions\Types\NotCreatedException;
use Mambo\Exceptions\Types\NotDeletedException;
use Mambo\Exceptions\Types\NotUpdatedException;

/**
 * Class PackageRepository
 * @package App\Repositories
 */
class PackageRepository extends Repository implements CrudRepositoryInterface
{

    /**
     * @var PackageItemRepository|null
     */
    private $packageItemRepository = null;

    /**
     * PackageRepository constructor.
     * @param App $app
     * @param PackageItemRepository $packageItemRepository
     */
    public function __construct(App $app, PackageItemRepository $packageItemRepository)
    {
        $this->packageItemRepository = $packageItemRepository;
        parent::__construct($app);
    }

    /**
     * @return string
     */
    protected function model()
    {
        return Package::class;
    }

    /**
     * @param $eventTypeId
     * @return mixed
     */
    public function getByEventType($eventTypeId)
    {
        return $this->getModel()->whereEventTypeId($eventTypeId)->get();
    }

    /**
     * @param $data
     * @return mixed
     * @throws NotCreatedException
     */
    public function create($data)
    {
        try {
            DB::beginTransaction();
            $items = $data['items'];
            unset($data['items']);

            $data = $this->clearFillableData($data);
            $row = $this->getModel()->create($data);

            foreach ($items as $item) {
                $packageItem = $this->packageItemRepository->clearFillableData($item);
                $row->package_items()->create($packageItem);
            }

            DB::commit();

            return $row;
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();

            throw new NotCreatedException(trans('exception.package_not_created'));
        }
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     * @throws NotUpdatedException
     */
    public function update($id, $data)
    {
        try {
            DB::beginTransaction();
            $items = $data['items'];
            unset($data['items']);

            $data = $this->clearFillableData($data);
            $this->getModel()->whereId($id)->update($data);

            $row = $this->getById($id);

            if(isset($items) && !empty($items)) {
                $row->package_items()->delete();
                foreach ($items as $item) {
                    $packageItem = $this->packageItemRepository->clearFillableData($item);
                    $row->package_items()->create($packageItem);
                }
            }

            DB::commit();

            return $row;
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();
            throw new NotUpdatedException(trans('exception.package_not_updated'));
        }
    }

    /**
     * @param $id
     * @return bool
     * @throws NotDeletedException
     */
    public function delete($id)
    {
        try {
            $this->getModel()->whereId($id)->delete();
            return true;
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            throw new NotDeletedException(trans('exception.package_not_deleted'));
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->getByFieldValue('name', $name);
    }
}
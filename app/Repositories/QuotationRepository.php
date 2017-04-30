<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\Package;
use App\Models\Quotation;
use App\Repositories\Contracts\CrudRepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mambo\Exceptions\Types\NotCreatedException;
use Mambo\Exceptions\Types\NotDeletedException;
use Mambo\Exceptions\Types\NotUpdatedException;

/**
 * Class QuotationRepository
 * @package App\Repositories
 */
class QuotationRepository extends Repository implements CrudRepositoryInterface
{

    /**
     * @var QuotationMaterialRepository|null
     */
    private $quotationMaterialRepository = null;

    /**
     * QuotationRepository constructor.
     * @param App $app
     * @param QuotationMaterialRepository $quotationMaterialRepository
     */
    public function __construct(App $app, QuotationMaterialRepository $quotationMaterialRepository)
    {
        $this->quotationMaterialRepository = $quotationMaterialRepository;
        parent::__construct($app);
    }

    /**
     * @return string
     */
    protected function model()
    {
        return Quotation::class;
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
                $packageItem = $this->quotationMaterialRepository->clearFillableData($item);
                $row->quotation_materials()->create($packageItem);
            }

            DB::commit();

            return $row;
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();

            throw new NotCreatedException(trans('exception.quotation_not_created'));
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
                $row->quotation_materials()->delete();
                foreach ($items as $item) {
                    $packageItem = $this->quotationMaterialRepository->clearFillableData($item);
                    $row->quotation_materials()->create($packageItem);
                }
            }

            DB::commit();

            return $row;
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();
            throw new NotUpdatedException(trans('exception.quotation_not_updated'));
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

            throw new NotDeletedException(trans('exception.quotation_not_deleted'));
        }
    }

}
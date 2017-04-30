<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:27
 */

namespace App\Services;


use App\Repositories\PackageRepository;
use App\Repositories\QuotationRepository;
use App\Serializers\CustomSerializer;
use App\Transformers\QuotationTransformer;
use Mambo\Exceptions\Types\NotCreatedException;
use Mambo\Exceptions\Types\NotFoundException;

/**
 * Class QuotationService
 * @package App\Services
 */
class QuotationService
{

    /**
     * @var QuotationRepository|null
     */
    private $quotationRepository = null;

    /**
     * QuotationService constructor.
     * @param QuotationRepository $quotationRepository
     */
    public function __construct(QuotationRepository $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $data = $this->quotationRepository->getAll();
        return fractal()
            ->collection($data, new QuotationTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $quotationId
     * @return array
     */
    public function getById($quotationId)
    {
        $data = $this->validateExistsById($quotationId);
        return fractal()
            ->item($data, new QuotationTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $data
     * @return array
     */
    public function create($data)
    {
        $row = $this->quotationRepository->create($data);
        return fractal()
            ->item($this->quotationRepository->getById($row->id), new QuotationTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $quotationId
     * @param $data
     * @return array
     */
    public function update($quotationId, $data)
    {

        $row = $this->validateExistsById($quotationId);

        $this->quotationRepository->update($row->id, $data);
        return fractal()
            ->item($this->quotationRepository->getById($row->id), new QuotationTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

    /**
     * @param $quotationId
     * @return bool
     */
    public function delete($quotationId)
    {
        $this->validateExistsById($quotationId);
        return $this->quotationRepository->delete($quotationId);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    private function validateExistsById($id)
    {
        $row = $this->quotationRepository->getById($id);
        if (is_null($row)) {
            throw new NotFoundException(trans('exception.quotation_not_found'));
        }

        return $row;
    }

}
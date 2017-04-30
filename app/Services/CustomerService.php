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
use App\Serializers\CustomSerializer;
use App\Transformers\CustomerTransformer;
use App\Transformers\EventTypeTransformer;
use Mambo\Exceptions\Types\NotFoundException;

/**
 * Class CustomerService
 * @package App\Services
 */
class CustomerService
{

    /**
     * @var EventTypeRepository|null
     */
    private $customerRepository = null;

    /**
     * CustomerService constructor.
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param $type
     * @param $number
     * @return array
     * @throws NotFoundException
     */
    public function getByDocument($type, $number) {
        $row = $this->customerRepository->getByDocument($type, $number);
        if (is_null($row)) {
            throw new NotFoundException(trans('exception.customer_not_found'));
        }
        return fractal()
            ->item($row, new CustomerTransformer(), 'data')
            ->serializeWith(new CustomSerializer())
            ->toArray();
    }

}
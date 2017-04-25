<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:26
 */

namespace App\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    private $model;

    /**
     * Repository constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract protected function model();


    /**
     * @param $query
     * @return mixed
     */
    abstract public function search($query);


    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return Model
     */
    private function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            die("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->getModel()->get();
    }

    /**
     * @param $perPage
     * @param array $filters
     * @return mixed
     */
    public function getAllPaginated($perPage, $filters = [])
    {
        $filters = $this->removeNullsFromArray($filters);

        if (empty($filters)) {
            return $this->getModel()->paginate($perPage);
        } else {
            return $this->getFilteredModel($filters)->paginate($perPage);
        }
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getByFieldValue($key, $value)
    {
        return $this->model->where($key, '=', $value)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $data
     * @return array
     */
    protected function clearFillableData($data)
    {
        $finalData = [];
        foreach ($data as $key => $value) {
            if ($this->getModel()->isFillable($key) && !is_null($value)) {
                $finalData[$key] = $value;
            }
        }
        return $finalData;
    }

    /**
     * @param $filters
     * @return mixed
     */
    protected function getFilteredModel($filters)
    {
        $query = $this->getModel()->query();
        foreach ($filters as $key => $value) {
            if (!is_null($value) && $this->getModel()->isFillable($key)) {
                $query->orWhere($key, 'like', '%' . $value . '%');
            } elseif (!is_null($value) && is_array($value)) {
                $query->whereHas($key, function ($query) use ($value) {
                    $query->where(function ($query) use ($value) {
                        foreach ($value as $field => $items) {
                            foreach ($items as $item) {
                                $query->orWhere($field, '=', $item);
                            }
                        }
                    });
                })->get();
            }
        }
        return $query;
    }

    /**
     * @param $array
     * @return array
     */
    private function removeNullsFromArray($array)
    {
        $arrayAux = [];
        foreach ($array as $key => $item) {
            if (!is_null($item)) {
                $arrayAux[$key] = $item;
            }
        }
        return $arrayAux;
    }

}
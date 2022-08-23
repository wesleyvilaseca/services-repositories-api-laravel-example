<?php

namespace App\Repositories;


use App\Models\Brand;
use App\Repositories\Contracts\BrandRepositoryInterface;

class BrandRepository implements BrandRepositoryInterface
{
    protected $entity;

    public function __construct(Brand $brand)
    {
        $this->entity = $brand;
    }

    public function getById(int $id)
    {
        return $this->entity->find($id);
    }

    public function getAll(int $per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function store($data)
    {
        return $this->entity->create($data);
    }

    public function edit(int $id, $data)
    {
        return $this->entity->where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->entity->where('id', $id)->delete();
    }
}

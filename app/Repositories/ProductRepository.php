<?php

namespace App\Repositories;


use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getById(int $id)
    {
        return $this->entity->find($id);
    }

    public function getAll(int $per_page, string $order)
    {
        return $this->entity
            ->orderBy('id', $order)
            ->paginate($per_page);
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

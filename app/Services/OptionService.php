<?php

namespace App\Services;

use App\Repositories\Contracts\OptionRepositoryInterface;

class OptionService
{

    private $repository;

    public function __construct(OptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(int $per_page)
    {
        return $this->repository->getAll($per_page);
    }

    public function getById(int $id)
    {
        return $this->repository->getById($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function edit(int $id, $data)
    {
        return $this->repository->edit($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}

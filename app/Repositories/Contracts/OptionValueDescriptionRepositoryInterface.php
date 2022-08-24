<?php

namespace App\Repositories\Contracts;


interface OptionValueDescriptionRepositoryInterface
{
    public function getAll(int $per_page);
    public function getById(int $id);
    public function store($data);
    public function edit(int $id, $data);
    public function delete(int $id);
}

<?php


namespace App\Http\Repositories;


interface RepoInterface
{
    public function getAll();

    public function store($obj);

    public function update($obj);

    public function destroy($obj);

    public function findById($id);
}

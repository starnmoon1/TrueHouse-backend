<?php


namespace App\Http\Services;


interface ServicesInterface
{
    public function getAll();

    public function store($request);

    public function update($request, $id);

    public function destroy($id);

    public function findById($id);
}

<?php
namespace App\Http\Repositories\Eloquent;

use App\House;
use App\Http\Repositories\HouseInterface;

class HouseRepo implements HouseInterface
{
    private $house;

    public function __construct(House $house) {
        $this->house = $house;
    }

    public function getAll()
    {
        return $this->house->all();
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function update($obj)
    {
        $obj->save();
    }

    public function destroy($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->house->findOrFail($id);
    }
}

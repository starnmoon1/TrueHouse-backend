<?php


namespace App\Http\Repositories\Eloquent;


use App\House;
use App\Image;

class ImgRepo
{
    private $img;
    private $house;

    public function __construct(Image $image, House $house)
    {
        $this->img = $image;
        $this->house = $house;
    }

    public function getImgByHouseId($house_id) {
        $image = new Image();
        return $image->where('house_id', '=', $house_id)->get();
    }

    public function store($obj) {
        $obj->save();
    }

    public function destroy($obj) {
        $obj->delete();
    }

    public function findByID($id) {

            }


}

<?php


namespace App\Http\Services\User;


use App\Http\Repositories\User\UserRepo;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepo;
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function findById($id)
    {
        return $this->userRepo->findById($id);
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function store($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->avatar =$this->uploadImage($request);
        $user->sex = $request->sex;
        $user->password = Hash::make($request->password);
        $this->userRepo->save($user);
        return $user;
    }

    public function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            $image_name = 'images/no_image.jpg';
        } else {
            $image = $request->file('image');
            $image_name = 'images/' . date('d-m-Y H:i:s') . '.' . $image->getClientOriginalName();
            $image->storeAs('public/', $image_name);
        }
        return $image_name;
    }

}

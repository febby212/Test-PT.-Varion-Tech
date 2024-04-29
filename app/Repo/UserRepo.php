<?php

namespace App\Repo;

use App\Interface\UserInterface;
use App\Models\User;

class UserRepo implements UserInterface
{
    public function getAll()
    {
        return User::get();
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function getByIdWedding($id) {
        return User::with('fatherWedding', 'citizenFather', 'reliFather', 'jobFather', 'nikFather')->where('id_wedding', $id)->firstOrFail();
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function edit($id, $data)
    {
        return User::where('id_wedding', $id)->update($data);
    }

    public function destroy($id)
    {
        return User::where('id_wedding', $id)->delete();
    }

}

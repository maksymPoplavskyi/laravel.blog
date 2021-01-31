<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository
{

    public function getModel(): User
    {
        return User::getModel();
    }

    public function add($fields)
    {
        $this->getModel()->create($fields);
    }

    public function edit($fields)
    {
        $this->getModel()->update($fields);
    }

    public function remove()
    {
        Storage::delete("uploads/$this->image");
        $this->getModel()->delete();
    }

    public function makeAdmin()
    {
        $this->getModel()->is_admin = $this->getModel()::IS_ADMIN;
    }

    public function makeStandard()
    {
        $this->getModel()->is_admin = $this->getModel()::IS_STANDARD;
    }

    public function toggleAdmin($isAdmin)
    {
        return ($isAdmin === $this->getModel()::IS_ADMIN) ? $this->makeAdmin() : $this->makeStandard();
    }

    public function ban()
    {
        return $this->getModel()->status = $this->getModel()::IS_BANNED;
    }

    public function unban()
    {
        return $this->getModel()->status = $this->getModel()::IS_ACTIVE;
    }

    public function toggleBan($isBan)
    {
        return ($isBan === $this->getModel()::IS_BANNED) ? $this->ban() : $this->unban();
    }

}

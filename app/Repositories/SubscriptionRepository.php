<?php


namespace App\Repositories;


use App\Models\Subscription;
use Illuminate\Support\Str;

class SubscriptionRepository extends BaseRepository
{

    public function getModel(): Subscription
    {
        return Subscription::getModel();
    }

    public function add($email)
    {
        return $this->getModel()->create([
            'email' => $email,
            'token' => Str::random(100)
        ]);
    }

    public function remove($id)
    {
        $this->getModel()::where('id', $id)->delete();
    }
}

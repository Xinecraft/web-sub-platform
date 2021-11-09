<?php
namespace App\Traits;

use App\Models\User;

trait HasSubscribers {
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'user_subscriptions')->withTimestamps();
    }
}

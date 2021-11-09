<?php
namespace App\Traits;

use App\Models\Website;

trait HasSubscriptions {
    public function subscriptions()
    {
        return $this->belongsToMany(Website::class, 'user_subscriptions')->withTimestamps();
    }

    public function subscribe($websiteId)
    {
        return $this->subscriptions()->syncWithoutDetaching([$websiteId]);
    }

    public function unsubscribe($websiteId)
    {
        return $this->subscriptions()->detach($websiteId);
    }
}

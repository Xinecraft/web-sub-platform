<?php

namespace App\Models;

use App\Traits\HasSubscribers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory, HasSubscribers;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App;

use Overtrue\LaravelLike\Traits\Likeable;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Favoriteable, Likeable;
    protected $table = 'videos';
    protected $primarykey = 'id';

}

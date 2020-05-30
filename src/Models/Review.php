<?php

namespace Secrethash\R8\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Review extends Model
{
    /**
     * @var string
     */
    protected $table = 'reviews';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    /**
     * Ratings Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

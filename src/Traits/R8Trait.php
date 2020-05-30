<?php

namespace Secrethash\R8\Traits;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\Review;
use Secrethash\R8\Models\Rating;

trait R8Trait
{
    /**
	 * Reviews Relationship
	 * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
	}
	
}

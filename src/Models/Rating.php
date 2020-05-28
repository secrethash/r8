<?php

namespace Secrethash\R8\Models;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\Review;
use Secrethash\R8\Models\RateType;

class Rating extends Model
{

	protected $table = "ratings";

	protected $gaurded = ['id','created_at'];

	/**
	 * Reviews
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */

	public function reviews()
	{
		return $this->belongsTo(Review::class);
	}
	
	/**
	 * Rate Types
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */

	public function type()
	{
		return $this->belongsToMany(RateType::class, 'rating_rate_type');
	}

	/**
	 * Count the number of Ratings
	 * 
	 * 
	 */
	public function count()
	{
		//
	}
	

}
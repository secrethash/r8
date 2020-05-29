<?php

namespace Secrethash\R8\Models;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\Review;
use Secrethash\R8\Models\RateType;

class Rating extends Model
{

	protected $table = "ratings";

	protected $gaurded = ['id','created_at'];

	protected $fillable = ['value'];

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
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */

	public function type()
	{
		return $this->belongsTo(RateType::class);
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
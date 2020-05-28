<?php

namespace Secrethash\R8\Models;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\Review;

class ReviewType extends Model
{

	protected $table = "review_types";

	protected $gaurded = ['id','created_at'];

	/**
	 * Reviews Types
	 * 
	 * 
	 */

	public function reviews()
	{
		return $this->hasMany(Review::class);
	}

}
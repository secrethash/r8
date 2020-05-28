<?php

namespace Secrethash\R8\Models;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\Review;

class ReviewType extends Model
{

	protected $table = "r8types";

	protected $gaurded = ['id','created_at'];

	/**
	 * Reviews Types
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */

	public function reviews()
	{
		return $this->belongsToMany(Review::class, 'review_r8types');
	}

}
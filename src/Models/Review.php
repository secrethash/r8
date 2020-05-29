<?php

namespace Secrethash\R8\Models;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\ReviewType;
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
	 * Type of Review
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
        return $this->belongsTo(User::class);
    }


    /**
     * Get Ratings of a Single Type 
	 * @param string $type Secrethash/R8/Models/ReviewType
     *
     * @return static
     */
    public function ofType($type, $id = null, $sort = 'desc')
    {
		$reviewType = RateType::where('slug', $type)->get();
		if ($id != null) {
			$reviews = $reviewType->reviews
								->where('rateable_id', $id)
								->orderBy('created_at', $sort)
								->get();
		} else {
			$reviews = $reviewType->reviews
								->orderBy('created_at', $sort)
								->get();
		}

		return $reviews;
	}
	
	/**
	 * Count the Number of Reviews
	 */
	public function count()
	{
		// $this->count()
	}


    /**
     * @param Model $rateable
     * @param $data
     * @param Model $author
     *
     * @return static
     */
    public function createReview(Model $rateable, $data, Model $author)
    {
        $review = new static();
		$review->fill($data);
		$review->user = $author;

        $rateable->r8()->save($review);

        return $review;
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateRating($id, $data)
    {
        $review = static::find($id);
        $review->update($data);

        return $review;
    }

    /**
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getAll($id, $sort = 'desc')
    {
        $reviews = $this->select('*')
            ->where('rateable_id', $id)
            ->orderBy('created_at', $sort)
            ->get();

        return $reviews;
    }

    /**
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getApproved($id, $sort = 'desc')
    {
        $reviews = $this->select('*')
            ->where('rateable_id', $id)
            ->where('approved', true)
            ->orderBy('created_at', $sort)
            ->get();

        return $reviews;
    }

    /**
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getNotApproved($id, $sort = 'desc')
    {
        $reviews = $this->select('*')
            ->where('rateable_id', $id)
            ->where('approved', false)
            ->orderBy('created_at', $sort)
            ->get();

        return $reviews;
    }

    /**
     * @param $id
     * @param $limit
     * @param $sort
     * @return mixed
     */
    public function getRecent($id, $limit = 5, $sort = 'desc')
    {
        $reviews = $this->select('*')
            ->where('rateable_id', $id)
            ->where('approved', true)
            ->orderBy('created_at', $sort)
            ->limit($limit)
            ->get();

        return $reviews;
    }

    /**
     * @param $id
     * @param $limit
     * @param $approved
     * @param $sort
     * @return mixed
     */
    public function getRecentUserReviews($id, $limit = 5, $approved = true, $sort = 'desc')
    {
        $reviews = $this->select('*')
            ->where('author_id', $id)
            ->where('approved', $approved)
            ->orderBy('created_at', $sort)
            ->limit($limit)
            ->get();

        return $reviews;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteReview($id)
    {
        return static::find($id)->delete();
    }
}

<?php

namespace Secrethash\R8\Traits;

use Illuminate\Database\Eloquent\Model;
use Secrethash\R8\Models\Review;

trait R8Trait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function review()
    {
        return $this->morphMany(Review::class, 'rateable');
	}
	
    /**
     *
     *
     * @param $round
     * @param $onlyApproved
     * @return mixed
     */
    public function averageRating($type = null, $round = null, $onlyApproved = false)
    {
      $where = $onlyApproved ? [['approved', '1']] : [];

      if ($round) {
            return $this->review()
              ->selectRaw('ROUND(AVG(rating), '.$round.') as average')
              ->where($where)
              ->pluck('average');
        }
		$average = $this->review()
						->selectRaw('AVG(rating) as average')
						->where($where)
						->pluck('average');
        return $average;
	}

    /**
     *
     * @var $round
     * @var $onlyApproved
     * @return mixed
     */
    // public function averageCustomerServiceRating($round= null, $onlyApproved= false)
    // {
    //     $where = $onlyApproved ? [['approved', '1']] : [];

    //     if ($round) {
    //         return $this->review()
    //             ->selectRaw('ROUND(AVG(customer_service_rating), '.$round.') as averageCustomerServiceReviewRateable')
    //             ->where($where)
    //             ->pluck('averageCustomerServiceReviewRateable');
    //     }

    //     return $this->review()
    //         ->selectRaw('AVG(customer_service_rating) as averageCustomerServiceReviewRateable')
    //         ->where($where)
    //         ->pluck('averageCustomerServiceReviewRateable');
    // }

    /**
     *
     * @param $round
     * @param $onlyApproved
     * @return mixed
     */
    // public function averageQualityRating($round = null, $onlyApproved= false)
    // {
    //     $where = $onlyApproved ? [['approved', '1']] : [];

    //     if ($round) {
    //         return $this->review()
    //             ->selectRaw('ROUND(AVG(quality_rating), '.$round.') as averageQualityReviewRateable')
    //             ->where($where)
    //             ->pluck('averageQualityReviewRateable');
    //     }

    //     return $this->review()
    //         ->selectRaw('AVG(quality_rating) as averageQualityReviewRateable')
    //         ->where($where)
    //         ->pluck('averageQualityReviewRateable');
    // }

    /**
     *
     * @var $round
     * @var $onlyApproved
     * @return mixed
     */
    // public function averageFriendlyRating($round = null, $onlyApproved= false)
    // {
    //     $where = $onlyApproved ? [['approved', '1']] : [];

    //     if ($round) {
    //         return $this->review()
    //             ->selectRaw('ROUND(AVG(friendly_rating), '.$round.') as averageFriendlyReviewRateable')
    //             ->where($where)
    //             ->pluck('averageFriendlyReviewRateable');
    //     }

    //     return $this->review()
    //         ->selectRaw('AVG(friendly_rating) as averageFriendlyReviewRateable')
    //         ->where($where)
    //         ->pluck('averageFriendlyReviewRateable');
    // }

    /**
     *
     * @var $round
     * @var $onlyApproved
     * @return mixed
     */
    // public function averagePricingRating($round = null, $onlyApproved= false)
    // {
    //     $where = $onlyApproved ? [['approved', '1']] : [];

    //     if ($round) {
    //         return $this->review()
    //             ->selectRaw('ROUND(AVG(pricing_rating), '.$round.') as averagePricingReviewRateable')
    //             ->where($where)
    //             ->pluck('averagePricingReviewRateable');
    //     }

    //     return $this->review()
    //         ->selectRaw('AVG(pricing_rating) as averagePricingReviewRateable')
    //         ->where($where)
    //         ->pluck('averagePricingReviewRateable');
    // }

    /**
     * @var $onlyApproved
     * @return mixed
     */
    public function countRating($onlyApproved= false)
    {
      return $this->review()
          ->selectRaw('count(rating) as countReviewRateable')
          ->where($onlyApproved ? [['approved', '1']] : [])
          ->pluck('countReviewRateable');
    }

    /**
     * @var $onlyApproved
     * @return mixed
     */
    // public function countCustomerServiceRating($onlyApproved= false)
    // {
    //     return $this->review()
    //         ->selectRaw('count(customer_service_rating) as countCustomerServiceReviewRateable')
    //         ->where($onlyApproved ? [['approved', '1']] : [])
    //         ->pluck('countCustomerServiceReviewRateable');
    // }

    /**
     * @var $onlyApproved
     * @return mixed
     */
    // public function countQualityRating($onlyApproved= false)
    // {
    //     return $this->review()
    //         ->selectRaw('count(quality_rating) as countQualityReviewRateable')
    //         ->where($onlyApproved ? [['approved', '1']] : [])
    //         ->pluck('countQualityReviewRateable');
    // }

    /**
     * @var $onlyApproved
     * @return mixed
     */
    // public function countFriendlyRating($onlyApproved= false) {
    //     return $this->review()
    //         ->selectRaw('count(friendly_rating) as countFriendlyReviewRateable')
    //         ->where($onlyApproved ? [['approved', '1']] : [])
    //         ->pluck('countFriendlyReviewRateable');
    // }

    /**
     * @var $onlyApproved
     * @return mixed
     */
    // public function countPriceRating($onlyApproved= false) {
    //     return $this->review()
    //         ->selectRaw('count(price_rating) as countPriceReviewRateable')
    //         ->where($onlyApproved ? [['approved', '1']] : [])
    //         ->pluck('countPriceReviewRateable');
    // }

    /**
     * @var $onlyApproved
     * @return mixed
     */
    public function sumRating($onlyApproved= false)
    {
        return $this->review()
            ->selectRaw('SUM(rating) as sumReviewRateable')
            ->where($onlyApproved ? [['approved', '1']] : [])
            ->pluck('sumReviewRateable');
    }

    /**
     * @param $max
     *
     * @return mixed
     */
    public function ratingPercent($max = 5)
    {
        $ratings = $this->review();
        $quantity = $ratings->count();
        $total = $ratings->selectRaw('SUM(rating) as total')->pluck('total');
        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    }

    /**
     * @param $data
     * @param $author
     * @param $parent
     *
     * @return mixed
     */
    public function CreateReview($data, Model $author, Model $parent = null)
    {
        return (new Review())->createReview($this, $data, $author);
    }

    /**
     * @param $id
     * @param $data
     * @param $parent
     *
     * @return mixed
     */
    public function updateReview($id, $data, Model $parent = null)
    {
		$review = Review::find($id);
		$review->update($data);
		return (new Review())->updateReview($id, $data);
    }

    /**
     *
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getReviews($id, $sort = 'desc')
    {
        return (new Review())->getAll($id, $sort);
    }

    /**
     *
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function approvedReviews($id, $sort = 'desc')
    {
        return (new Review())->getApproved($id, $sort);
    }

    /**
     *
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function notApprovedReviews($id, $sort = 'desc')
    {
        return (new Review())->getNotApproved($id, $sort);
    }

    /**
     * @param $id
     * @param $limit
     * @param $sort
     * @return mixed
     */
    public function recentReviews($id, $limit = 5, $sort = 'desc')
    {
        return (new Review())->getRecent($id, $limit,  $sort);
    }

    /**
     * @param $id
     * @param $limit
     * @param $approved
     * @param $sort
     * @return mixed
     */
    public function recentUserReviews($id, $limit = 5, $approved = true, $sort = 'desc')
    {
        return (new Review())->getRecentUserReviews($id, $limit, $approved, $sort);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteReview($id)
    {
        return (new Review())->deleteReview($id);
    }
}

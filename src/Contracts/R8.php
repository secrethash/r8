<?php

namespace Secrethash\R8\Contracts;

use Illuminate\Database\Eloquent\Model;

interface R8
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function review();

    /**
     *
     * @param $round
     * @return mixed
     */
    public function averageRating($round = null);

    /**
     *
     * @param $round
     * @return mixed
     */
    // public function averageCustomerServiceRating($round = null);
    // public function averageRatingType($round = null);

    /**
     *
     * @param $round
     * @return mixed
     */
    // public function averageQualityRating($round = null);

    /**
     *
     * @param $round
     * @return mixed
     */
    // public function averageFriendlyRating($round = null);

    /**
     *
     * @param $round
     * @return mixed
     */
    // public function averagePricingRating($round = null);

    /**
     *
     * @return mixed
     */
    public function countRating();

    /**
     *
     * @return mixed
     */
    // public function countCustomerServiceRating();
    // public function countTypeRating();

    /**
     *
     * @return mixed
     */
    // public function countQualityRating();

    /**
     *
     * @return mixed
     */
    // public function countFriendlyRating();

    /**
     *
     * @return mixed
     */
    // public function countPriceRating();

    /**
     *
     * @return mixed
     */
    public function sumRating();

    /**
     *
     * @param $max
     * @return mixed
     */
    public function ratingPercent($max = 5);

    /**
     *
     * @param $data
     * @param $author
     * @param $parent
     * @return mixed
     */
    public function CreateReview($data, Model $author, Model $parent = null);

    /**
     *
     * @param $id
     * @param $data
     * @param $parent
     * @return mixed
     */
    public function updateReview($id, $data, Model $parent = null);

    /**
     *
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getReviews($id, $sort = 'desc');

    /**
     *
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function approvedReviews($id, $sort = 'desc');

    /**
     *
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function notApprovedReviews($id, $sort = 'desc');

    /**
     * @param $id
     * @param $limit
     * @param $sort
     * @return mixed
     */
    public function recentReviews($id, $limit = 5, $sort = 'desc');

    /**
     * @param $id
     * @param $limit
     * @param $approved
     * @param $sort
     * @return mixed
     */
    public function recentUserReviews($id, $limit = 5, $approved = true, $sort = 'desc');

    /**
     *
     * @param $id
     * @return mixed
     */
    public function deleteReview($id);
}

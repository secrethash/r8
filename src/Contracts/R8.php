<?php

namespace Secrethash\R8\Contracts;

use Illuminate\Database\Eloquent\Model;

interface R8
{
    /**
     * Reviews Ralationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews();
}

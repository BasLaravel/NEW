<?php

namespace App\Policies;

use App\User;
use App\Laptop;
use App\LaptopReview;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaptopReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the laptop review.
     *
     * @param  \App\User  $user
     * @param  \App\LaptopReview  $laptopReview
     * @return mixed
     */
    public function view(User $user, LaptopReview $laptopReview)
    {
        //
    }

    /**
     * Determine whether the user can create laptop reviews.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Laptop $laptop)
    {
        if($laptop->UserMadeReview()==0){
            return true;

        }else{
            return false;
        }
   
    }

    /**
     * Determine whether the user can update the laptop review.
     *
     * @param  \App\User  $user
     * @param  \App\LaptopReview  $laptopReview
     * @return mixed
     */
    public function update(User $user, LaptopReview $laptopReview)
    {
        //
    }

    /**
     * Determine whether the user can delete the laptop review.
     *
     * @param  \App\User  $user
     * @param  \App\LaptopReview  $laptopReview
     * @return mixed
     */
    public function delete(User $user, LaptopReview $laptopReview)
    {
        //
    }

    /**
     * Determine whether the user can restore the laptop review.
     *
     * @param  \App\User  $user
     * @param  \App\LaptopReview  $laptopReview
     * @return mixed
     */
    public function restore(User $user, LaptopReview $laptopReview)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the laptop review.
     *
     * @param  \App\User  $user
     * @param  \App\LaptopReview  $laptopReview
     * @return mixed
     */
    public function forceDelete(User $user, LaptopReview $laptopReview)
    {
        //
    }
}


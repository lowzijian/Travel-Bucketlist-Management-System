<?php

namespace App\Policies;

use App\User;
use App\Travel_bucket_item;
use Illuminate\Auth\Access\HandlesAuthorization;

class TravelItemPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any travel_bucket_items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the travel_bucket_item.
     *
     * @param  \App\User  $user
     * @param  \App\Travel_bucket_item  $travelBucketItem
     * @return mixed
     */
    public function view(User $user, Travel_bucket_item $travelBucketItem)
    {
        return $user->id === $travelBucketItem->user_id;
    }

    /**
     * Determine whether the user can create travel_bucket_items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Travel_bucket_item $travelBucketItem)
    {
        //
        return $user->id === $travelBucketItem->user_id;
    }

    /**
     * Determine whether the user can update the travel_bucket_item.
     *
     * @param  \App\User  $user
     * @param  \App\Travel_bucket_item  $travelBucketItem
     * @return mixed
     */
    public function update(User $user, Travel_bucket_item $travelBucketItem)
    {
        return $user->id === $travelBucketItem->user_id;
    }

    /**
     * Determine whether the user can delete the travel_bucket_item.
     *
     * @param  \App\User  $user
     * @param  \App\Travel_bucket_item  $travelBucketItem
     * @return mixed
     */
    public function delete(User $user, Travel_bucket_item $travelBucketItem)
    {
        return $user->id === $travelBucketItem->user_id;
    }

    /**
     * Determine whether the user can restore the travel_bucket_item.
     *
     * @param  \App\User  $user
     * @param  \App\Travel_bucket_item  $travelBucketItem
     * @return mixed
     */
    public function restore(User $user, Travel_bucket_item $travelBucketItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the travel_bucket_item.
     *
     * @param  \App\User  $user
     * @param  \App\Travel_bucket_item  $travelBucketItem
     * @return mixed
     */
    public function forceDelete(User $user, Travel_bucket_item $travelBucketItem)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Client;
use App\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Client  $client
     * @return mixed
     */
    public function viewAny(Client $client)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Client  $client
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function view(Client $client, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Client  $client
     * @return mixed
     */
    public function create(Client $client)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Client  $client
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function update(Client $client, Reservation $reservation)
    {
        return $reservation->salarie->client->id === $client->id
                ? Response::allow()
                : Response::deny("Haha ! you can't do that");
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Client  $client
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function delete(Client $client, Reservation $reservation)
    {
        return $reservation->salarie->client->id === $client->id
                ? Response::allow()
                : Response::deny("Haha ! you can't do that");
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Client  $client
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function restore(Client $client, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Client  $client
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function forceDelete(Client $client, Reservation $reservation)
    {
        //
    }
}

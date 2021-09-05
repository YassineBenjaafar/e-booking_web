<?php

namespace App\Policies;

use App\Client;
use App\Booking;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BookingPolicy
{
    use HandlesAuthorization;

    public function viewAny(Client $client)
    {
    }

    public function view(Client $client, Booking $booking)
    {
    }

    public function create(Client $client)
    {
    }

    public function update(Client $client, Booking $booking)
    {
        dd($client);
        return $booking->employee->client->id === $client->id
                ? Response::allow()
                : Response::deny("Haha ! you can't do that");
    }

    public function delete(Client $client, Booking $booking)
    {
        return $booking->employee->client->id === $client->id
                ? Response::allow()
                : Response::deny("Haha ! you can't do that");
    }

    public function restore(Client $client, Booking $booking)
    {
    }

    public function forceDelete(Client $client, Booking $booking)
    {
    }
}

<?php

namespace WiderFunnel\Events;

use WiderFunnel\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use WiderFunnel\User;
use WiderFunnel\VacationRequest;

class RequestStatusChanged extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var VacationRequest
     */
    public $vacationRequest;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     * @param VacationRequest $vacationRequest
     */
    public function __construct(VacationRequest $vacationRequest)
    {
        $this->user = $vacationRequest->user;
        $this->vacationRequest = $vacationRequest;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.'.$this->user->id];
    }

}

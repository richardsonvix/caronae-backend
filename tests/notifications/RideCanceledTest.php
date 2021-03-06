<?php

namespace Tests\notifications;

use Caronae\Models\Ride;
use Caronae\Models\User;
use Caronae\Notifications\RideCanceled;
use Mockery;
use Tests\TestCase;

class RideCanceledTest extends TestCase
{
	protected $notification;

	public function setUp()
    {
        $ride = Mockery::mock(Ride::class);
    	$ride->shouldReceive('getAttribute')->with('id')->andReturn(1);
        $user = Mockery::mock(User::class);
        $user->shouldReceive('getAttribute')->with('id')->andReturn(2);
    	$this->notification = new RideCanceled($ride, $user);
        $this->notification->id = uniqid();
    }

    public function testPushNotificationArrayShouldContainAllFields()
    {
        $this->assertSame([
            'id'       => $this->notification->id,
            'message'  => 'Um motorista cancelou uma carona ativa sua',
            'msgType'  => 'cancelled',
            'rideId'   => 1,
            'senderId' => 2,
        ], $this->notification->toPush(Mockery::mock(User::class)));
    }
}

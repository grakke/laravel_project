<?php

use App\Events\ChirpCreated;
use App\Listeners\SendChirpCreatedNotifications;
use App\Models\Chirp;
use App\Models\User;
use App\Notifications\NewChirp;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;

test('ChirpCreated event is dispatched when chirp is created', function () {
    Event::fake([ChirpCreated::class]);

    $user = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $user->id]);

    Event::assertDispatched(ChirpCreated::class, function ($event) use ($chirp) {
        return $event->chirp->id === $chirp->id;
    });
});

test('SendChirpCreatedNotifications listener notifies other users', function () {
    Notification::fake();

    $chirpAuthor = User::factory()->create();
    $otherUser = User::factory()->create();

    $chirp = Chirp::factory()->create(['user_id' => $chirpAuthor->id]);

    $listener = new SendChirpCreatedNotifications();
    $listener->handle(new ChirpCreated($chirp));

    Notification::assertSentTo($otherUser, NewChirp::class);
    Notification::assertNotSentTo($chirpAuthor, NewChirp::class);
});

test('NewChirp notification contains correct mail content', function () {
    $user = User::factory()->create(['name' => 'John']);
    $chirp = Chirp::factory()->create([
        'user_id' => $user->id,
        'message' => 'Test chirp message',
    ]);

    $notification = new NewChirp($chirp);
    $mail = $notification->toMail($user);

    expect($mail->subject)->toBe("New Chirp from John");
});

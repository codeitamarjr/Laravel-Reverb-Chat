<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('channel_for_everyone', function ($user) {
    return true;
});

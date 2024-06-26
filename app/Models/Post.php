<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = 'blog_posts';
    protected $fillable = ['title', 'author', 'slug', 'body'];
    use HasFactory;
}
// App\Models\Post::create([                                                                                                             
// 'title' => 'YouTube\'s Android app is getting a sleep timer','author' => 'Vlad from gsmarena', 'slug' => 'YouTube-s-Android-app-is-getting-a-sleep-timer', 'body' => "You may like to watch YouTube videos as you fall asleep, but if you do you've certainly noticed a huge glaring omission in t
//     he service's mobile apps. There is absolutely no way to make YouTube stop playing after a set time - there's no sleep timer.That's set to
//      change soon. According to a teardown of the most recent version of the YouTube app for Android, a sleep timer is now finally in developm
//     ent, as evidenced by the strings in the screenshot below. As you'd expect, this will allow playback to stop after a specified period of t
//     ime. If you haven't actually managed to fall asleep before the timer ran out, you'll get the option to reset the timer or just be done wi
//     th it and continue watching without any additional timer. You will be able to set a specific number of hours and minutes for the timer, a
//     nd the remaining time will be displayed as a notification.YouTube Music already offers a sleep timer, as do many other streaming and podc
//     ast apps, but of course none of those gets as much use as YouTube so this will be a very nice addition when it does finally land.The lack
//      of a sleep timer is less of a problem on iOS, where you can set a system-wide timer that will end any playback when it reaches zero, but
//      there isn't a similar option in Android."]);
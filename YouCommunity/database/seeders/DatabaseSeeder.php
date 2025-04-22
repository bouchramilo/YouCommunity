<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(4)->create()->each(function ($user) {
            Event::factory(2)->create(['user_id' => $user->id]);
        });
        $this->call([
            EventInvitationSeeder::class,
        ]);
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();

        if ($users->isEmpty() || $events->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('event_invitations')->insert([
                'user_id' => $users->random()->id,
                'event_id' => $events->random()->id,
                'status' => ['pending', 'accepted', 'declined'][rand(0, 2)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

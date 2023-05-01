<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Chat\Entities\{Panel, Room, User, Ticket};
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;

class ChatDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Dummy data user
        for ($i = 1; $i <= 30; $i++) {
            User::insert([
                'name' => $faker->name,
                'email' => $faker->unique->safeEmail,
                'password' => bcrypt('secret')
            ]);
        }

        // for ($i = 1; $i <= 15; $i++) {
        //     $roomUuid = Uuid::uuid4()->toString();

        //     // Dummy data room
        //     Room::insert([
        //         'uuid' => $roomUuid,
        //         'status' => 'open',
        //         'created_at' => $faker->date(),
        //     ]);

        //     // Dummy data contact
        //     Panel::insert([
        //         'name_sender' => $faker->name,
        //         'message_content' => $faker->sentence(6),
        //         'notifikasi' => 1,
        //         'room_uuid' => $roomUuid,
        //         'sender_id' => $faker->numberBetween(31, 32),
        //         'receiver_id' => $faker->numberBetween(32, 31),
        //         'created_at' => $faker->date(),
        //     ]);
        // }
    }
}

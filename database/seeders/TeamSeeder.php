<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teams =
        [
            [
                'user_id' => 1,
                'name' => 'john`s Team',
                'personal_team' => 1,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),

            ],[
                'user_id' => 2,
                'name' => 'Andi`s Team',
                'personal_team' => 1,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]
        ];
            Team::insert($teams);
    }
}

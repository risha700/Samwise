<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $faker = Faker::create();

        // DB::table('users')->delete();

        // $users = array(
        //         ['name' => 'Tyler Torola', 'email' => 'tyler@tjt.codes', 'password' => Hash::make('password')],
        //         ['name' => 'Bobby Anderson', 'email' => 'bobby@pangolin4x4.com', 'password' => Hash::make("***REMOVED***")],
        //         ['name' => 'Ike Goss', 'email' => 'pangolin4x4@aol.com', 'password' => Hash::make('***REMOVED***')],
        // );
            
        // // Loop through each user above and create the record for them in the database
        // foreach ($users as $user)
        // {
        //     User::create($user);
        // }

        // foreach (range(1,10) as $index) {
        //     $invoice = [
        //         'first_name' => $faker->firstName,
        //         'last_name' => $faker->lastName,

        //     ]
        // }

        foreach (range(1,10) as $index) {
            
        }

        Model::reguard();
    }
}

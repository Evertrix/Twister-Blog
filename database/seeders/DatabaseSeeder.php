<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plans;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Plans::factory()->create([
            "title" => 'Basic Plan',
            "amount" => 20,
            "identifier" => "basic_plan",
            "stripe_id" => "price_1Jpd42Dcurwhr0A0urlEG5Vc"
        ]);

        User::factory()
//            ->count(5)
            ->hasPosts(1)
            ->hasComments(1)
            ->create(
                [
                    'name' => 'John Doe',
                    'username' => 'JohnDoe',
                    'email' => 'johndoe@gmail.com',
                    'password' => Hash::make('qwe123qwe123')
                ]
            );

        // After writing all the code, in command: php artisan db:seed
        // php artisan migrate:fresh --seed

        $this->call([
            UserSeeder::class,
            PlansSeeder::class,
            CommentSeeder::class,
        ]);
    }
}

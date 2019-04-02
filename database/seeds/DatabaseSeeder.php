<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        User::truncate();
        $this->call('PostsTableSeeder'); // php artisan db:seed will trigger this part
        $this->call('UsersTableSeeder'); // php artisan db:seed will trigger this part
    }
}

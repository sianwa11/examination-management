<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\ClassStudents;
use App\Models\User;
use Database\Factories\ClassesFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::factory()->has(
            Classes::factory()->count(3)->state(function (array $attributes, User $user){
                return ['created_by' => $user->id];
            }), 'my_classes')
            ->create(['role' => 'teacher', 'email' => 'mode@gmail.com']);

        User::factory()->has(
            ClassStudents::factory()->state(function (array $attributes, User $user){
                return ['class_id' => 1, 'user_id' => $user->id];
            })
        , 'class_students')->count(3)->create();
    }
}

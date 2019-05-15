<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        for ($i = 1; $i <= 2; $i++) {
            $users->each(function ($user) {
                $note = factory(\App\Note::class)->make();
                $note->user()->associate($user);
                $note->save();
            });
        }
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => 'Contact 1',
            'number' => '062547892',
            'body' => 'this is a bady for the contact 1',
            'slug' => 'Contact_1',
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attraction_id' => $this->faker->numberBetween(1,2),
            'str_address' => $this->faker->address,
            'city' => $this->faker->word,
            'state' => $this->faker->word,
            'zipcode' => $this->faker->numberBetween(23453,30000),
            'name' => $this->faker->word,
            'owner_firstname' =>  $this->faker->firstName($gender = null),
            'owner_lastname' => $this->faker->lastName,
        ];
    }
}

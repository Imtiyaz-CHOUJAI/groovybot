<?php

namespace Database\Factories;

use App\Models\Robot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RobotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Robot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName . ' ' . $this->faker->lastName;
        $avatar = Str::lower(str_replace(' ', '-', $name));

        return [
            'name' => $name,
            'power_move' => $this->faker->randomElement(Robot::POWER_MOVES),
            'experience' => $this->faker->numberBetween(0, 20),
            'out_of_order' => $this->faker->boolean,
            'avatar' => 'https://robohash.org/' . $avatar . '.png',
        ];
    }
}

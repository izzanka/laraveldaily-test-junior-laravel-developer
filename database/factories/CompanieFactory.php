<?php

namespace Database\Factories;

use App\Models\Companie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Companie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'logo' => 'default.jpg',
            'website' => $this->faker->domainName
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = \App\Models\Campaign::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 week'),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'countries' => json_encode(['eg', 'us']), // Targeting Egypt and USA
            'is_active' => true, // Setting the campaign as active
        ];
    }
}

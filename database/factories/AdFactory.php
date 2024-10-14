<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    protected $model = \App\Models\Ad::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'image_url' => $this->faker->imageUrl(),
            'target_url' => $this->faker->url(),
            'spots' => json_encode(['header', 'right-sidebar']), // Example spots
            'countries' => json_encode(['eg', 'us']), // Targeting Egypt and USA
            'campaign_id' => \App\Models\Campaign::factory(), // Creating a campaign for the ad
        ];
    }
}

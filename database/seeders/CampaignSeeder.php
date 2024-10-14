<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Ad;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        // Create 5 campaigns
        Campaign::factory()
            ->count(5)
            ->create()
            ->each(function ($campaign) {
                // Create 2 ads for each campaign
                Ad::factory()
                    ->count(2)
                    ->create(['campaign_id' => $campaign->id]);
            });
    }
}

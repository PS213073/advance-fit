<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definieer de abonnementen en maak ze aan
        $subscriptions = [
            ['name' => 'Basic', 'price' => 10, 'description' => 'Basic subscription with access to standard features such as browsing content and receiving updates.', 'status' => 1],
            ['name' => 'Premium', 'price' => 20, 'description' => 'Premium subscription with additional features including ad-free experience, access to exclusive content, and early access to new releases.', 'status' => 1],
            ['name' => 'Gold', 'price' => 30, 'description' => 'Gold subscription with all features including priority customer support, personalized recommendations, and access to all premium and exclusive content.', 'status' => 1],
        ];

        foreach ($subscriptions as $subscription) {
            Subscription::create($subscription);
        }
    }
}

<?php

namespace Database\Seeders;

// database/seeders/SiteStatsSeeder.php
use Illuminate\Database\Seeder;
use App\Models\SiteStat;

class SiteStatsSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            'team' => 4,
            'lines' => 124000,
            'updates' => 12,
            'projects' => 3,
        ];

        foreach ($stats as $name => $value) {
            SiteStat::updateOrCreate(
                ['name' => $name],
                ['value' => $value]
            );
        }
    }
}

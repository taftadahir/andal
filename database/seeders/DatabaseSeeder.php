<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Local and Production Environment
        User::factory()->create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'andal@admin.com',
        ]);

        User::factory()->create([
            'name' => 'Subscriber',
            'role' => 'subscriber',
            'email' => 'andal@subscriber.com',
        ]);

        // Local Environment Only
        if (App::environment('local')) {
            User::factory(10)->create();

            // Assets
            Asset::create([
                'name' => 'asset-1.jpg',
                'original_name' => 'choong-deng-xiang-EbbqeyHpbto-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-2.jpg',
                'original_name' => 'choong-deng-xiang-GEONQEnR_3A-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-3.jpg',
                'original_name' => 'guerrillabuzz-crypto-pr-_rZnChsIFuQ-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-4.jpg',
                'original_name' => 'guerrillabuzz-crypto-pr-JlijbOtSWuw-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-5.jpg',
                'original_name' => 'guerrillabuzz-crypto-pr-UxDU0Gg5pqQ-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-6.jpg',
                'original_name' => 'michael-fortsch-AA5sf7WTv10-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-7.jpg',
                'original_name' => 'mo-eJymAZsXupQ-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-8.jpg',
                'original_name' => 'nenad-novakovic-L2QB-rG5NM0-unsplash.jpg',
            ]);
            Asset::create([
                'name' => 'asset-9.jpg',
                'original_name' => 'peio-bty-vBCVcWUyvyM-unsplash.jpg',
            ]);

            User::factory(10)->create();
            
            // Articles
            $this->call([
                ArticleSeeder::class,
            ]);
        }
    }
}

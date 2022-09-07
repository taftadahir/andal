<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $author = User::admin()->inRandomOrder()->first();
        $banner = Asset::inRandomOrder()->first();

        return [
            'author' => $author->id,
            'banner' => $banner->id,

            'title' => fake()->text(100),
            'slug' => fake()->unique()->slug(5),

            'content' => fake()->sentence(10),
            'excerpt' => fake()->sentence(3),

            'read_time' => fake()->numberBetween(3600, 7200),
            'views' => fake()->numberBetween(0, 3000000 )
        ];
    }

    public function publish()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'published',
                'published_at' => Carbon::now(),
            ];
        });
    }

    public function archive()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'archived',
                'archived_at' => Carbon::now(),
            ];
        });
    }

    public function content($content = "")
    {
        return $this->state(function (array $attributes) use ($content){
            return [
                'content' => $content,
            ];
        });
    }

    public function excerpt($excerpt = "")
    {
        return $this->state(function (array $attributes) use ($excerpt) {
            return [
                'content' => $excerpt,
            ];
        });
    }
}

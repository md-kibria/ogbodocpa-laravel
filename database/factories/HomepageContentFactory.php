<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomepageContent>
 */
class HomepageContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section' => null,
            'title' => null,
            'sub_title' => null,
            'description' => null,
            'image' => null,
            'schedule' => null,
            'address' => null,
            'url' => null,
        ];
    }
}

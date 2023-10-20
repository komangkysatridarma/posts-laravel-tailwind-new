<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // sentence: untuk menambahkan kalimat, default nya 6
            // mt_rand: untuk mengidupkan kalimat
            'title'=> $this->faker->sentence(mt_rand(2,8)),
            'slug'=>$this->faker->slug(),
            'excerpt'=>$this->faker->paragraph(),
            // 'body'=>'<p>' . implode("</p><p>",$this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            'body'=>collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                return "<p>$p</p>";
            })->implode(''),
            'user_id'=>mt_rand(1,4),
            'category_id'=>mt_rand(1,6)
        ];
    }
}

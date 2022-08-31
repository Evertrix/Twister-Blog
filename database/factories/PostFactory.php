<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    protected $guarded = [
        'user_id',
        'category_id',
    ];

    protected $fillable = [
        'user_id',
        'category_id',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image();
        $imageFile = new File($image);

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'image' => str_replace('images/', '', Storage::disk('public')->putFile('images', $imageFile)),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>'.implode('</p><p>', $this->faker->sentences(3)).'</p>',
            'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(6)).'</p>',
        ];
    }
}

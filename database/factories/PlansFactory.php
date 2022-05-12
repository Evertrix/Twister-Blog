<?php

namespace Database\Factories;

use App\Models\Plans;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Plans::class;

    public function definition()
    {
        return [
            "title" => 'Basic Plan',
            "amount" => 20,
            "identifier" => "basic_plan",
            "stripe_id" => "price_1Jpd42Dcurwhr0A0urlEG5Vc"
        ];
    }
}

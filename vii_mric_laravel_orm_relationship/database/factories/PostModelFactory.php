<?php

namespace Database\Factories;

use App\Models\PostModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostModel>
 */
class PostModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        //1 4 6 => [1, 4, 6]
        $userId = collect($userIds)->random();
        //[1, 4, 6] => random 1 2
        
        /*   Example : user =>1 4 6     */
        
        //Date time
        $currentDate = Carbon::now()->format('d-m-y');

        return [
            'content'    => $this->faker->text(50),
            'user_id'     => $userId,
            'created_at' => $currentDate,
            'updated_at' => $currentDate
        ];
    }
}

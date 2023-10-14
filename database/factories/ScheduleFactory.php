<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => rand(1,10),
            'subject_id' => 5,
            'schedule_time' => fake()->dateTime(),
            'schedule_type' => 'online',
            'room' => 'G9-001'
        ];
    }
}

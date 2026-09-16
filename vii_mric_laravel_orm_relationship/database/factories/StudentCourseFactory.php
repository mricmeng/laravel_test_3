<?php

namespace Database\Factories;

use App\Models\CourseModel;
use App\Models\Model;
use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class StudentCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentIds = StudentModel::pluck('id')->toArray();
        $ranStuentId = collect($studentIds)->random();

        $courseIds = CourseModel::pluck('id')->toArray();
        $ranCourseId = collect($courseIds)->random();
        return [
           'student_id' => $ranStuentId,
           'course_id' => $ranCourseId,
        ];
    }
}

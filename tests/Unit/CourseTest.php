<?php

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;

test('course belongs to a teacher', function () {
    $teacher = Teacher::factory()->create();
    $course = Course::factory()->create(['teacher_id' => $teacher->id]);

    expect($course->teacher)->toBeInstanceOf(Teacher::class);
    expect($course->teacher->id)->toBe($teacher->id);
});

test('course has many students through pivot', function () {
    $teacher = Teacher::factory()->create();
    $course = Course::factory()->create(['teacher_id' => $teacher->id]);
    $students = Student::factory()->count(3)->create();
    $course->students()->attach($students->pluck('id'));

    expect($course->students)->toHaveCount(3);
    expect($course->students->first())->toBeInstanceOf(Student::class);
});

test('course has fillable attributes', function () {
    $course = new Course();

    expect($course->getFillable())->toBe(['name', 'description', 'content', 'teacher_id']);
});

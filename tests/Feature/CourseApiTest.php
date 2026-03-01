<?php

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;

test('courses api index returns paginated list', function () {
    $teacher = Teacher::factory()->create();
    Course::factory()->count(3)->create(['teacher_id' => $teacher->id]);

    $response = $this->getJson('/api/courses');

    $response->assertOk();
    $response->assertJsonStructure([
        'data',
        'current_page',
        'per_page',
        'total',
    ]);
    $response->assertJsonCount(3, 'data');
});

test('courses api index can filter by name', function () {
    $teacher = Teacher::factory()->create();
    Course::factory()->create(['teacher_id' => $teacher->id, 'name' => 'Laravel Course']);
    Course::factory()->create(['teacher_id' => $teacher->id, 'name' => 'Vue Course']);

    $response = $this->getJson('/api/courses?name=Laravel');

    $response->assertOk();
    $response->assertJsonCount(1, 'data');
    $response->assertJsonFragment(['name' => 'Laravel Course']);
});

test('courses api show returns course with relations', function () {
    $teacher = Teacher::factory()->create();
    $course = Course::factory()->create(['teacher_id' => $teacher->id]);
    $students = Student::factory()->count(2)->create();
    $course->students()->attach($students->pluck('id'));

    $response = $this->getJson("/api/courses/{$course->id}");

    $response->assertOk();
    $response->assertJsonFragment(['name' => $course->name]);
});

test('courses api destroy deletes course and detaches students', function () {
    $teacher = Teacher::factory()->create();
    $course = Course::factory()->create(['teacher_id' => $teacher->id]);
    $students = Student::factory()->count(2)->create();
    $course->students()->attach($students->pluck('id'));

    $response = $this->deleteJson("/api/courses/{$course->id}");

    $response->assertNoContent();
    $this->assertDatabaseMissing('courses', ['id' => $course->id]);
    $this->assertDatabaseCount('course_student', 0);
});

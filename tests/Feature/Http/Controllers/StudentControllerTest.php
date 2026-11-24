<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Student;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_updated_student_shows_success_message_after_redirect_to_index(): void
    {
        $student = Student::factory()->create([
            'name' => 'Student Before Update',
            'nim' => '20240001',
        ]);

        $response = $this->put(route('student.update', $student), [
            'name' => 'Student After Update',
            'nim' => '20240002',
        ]);

        $response->assertRedirectToRoute('student.index');
        $response->assertSessionHas('success', 'Data berhasil diubah.');
        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Student After Update',
            'nim' => '20240002',
        ]);

        $this->get(route('student.index'))
            ->assertOk()
            ->assertSeeText('Data berhasil diubah.');
    }

    public function test_student_index_displays_at_most_100_students_in_numbered_list(): void
    {
        for ($number = 1; $number <= 101; $number++) {
            Student::factory()->create([
                'name' => "Student {$number}",
                'nim' => str_pad((string) $number, 12, '0', STR_PAD_LEFT),
            ]);
        }

        $this->get(route('student.index'))
            ->assertOk()
            ->assertSeeText('Student 100')
            ->assertDontSeeText('Student 101');
    }
}

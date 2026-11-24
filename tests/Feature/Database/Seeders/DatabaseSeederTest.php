<?php

namespace Tests\Feature\Database\Seeders;

use App\Models\Student;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_database_seeder_completes_existing_student_data_to_100_without_duplicates(): void
    {
        Student::factory()->count(10)->create();

        $this->seed(DatabaseSeeder::class);
        $this->assertDatabaseCount('students', 100);

        $this->seed(DatabaseSeeder::class);
        $this->assertDatabaseCount('students', 100);
    }
}

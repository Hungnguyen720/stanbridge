<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Student;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testApiEndpoint()
    {
        //When I fetch a student from the database
        $student = factory(Student::class)->create();
        
        //Then the student should have these keys
        $this->assertArrayHasKey('first_name', $student);
        $this->assertArrayHasKey('last_name', $student);
        $this->assertArrayHasKey('email', $student);
        $this->assertArrayHasKey('attendance', $student);
        
    }
}

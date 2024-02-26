<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Attendance;
use App\Models\User;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;
    // test to check if the attendance record is created successfully
    public function testStore()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate as the user
        $response = $this->actingAs($user)->postJson('/attendance', [
            'employeeId' => 1,
            'arrivalTime' => '2022-01-01 08:00:00',
            'departureTime' => '2022-01-01 16:00:00',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Attendance recorded successfully');

        $this->assertDatabaseHas('attendances', [
            'employee_id' => 1,
            'arrival_time' => '2022-01-01 08:00:00',
            'departure_time' => '2022-01-01 16:00:00',
        ]);
    }
    // test to check if the attendance records are returned successfully
    public function testIndex()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate as the user
        $response = $this->actingAs($user)->getJson('/attendance');

        $response->assertStatus(200);
    }
    // test can download excel file
    public function testExportExcel()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate as the user
        $response = $this->actingAs($user)->get('/attendance/export');

        $response->assertStatus(200);
    }
    // test can download pdf file
    public function testExportPdf()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate as the user
        $response = $this->actingAs($user)->get('/attendance/export/pdf');

        $response->assertStatus(200);
    }
}
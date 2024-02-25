<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Attendance;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $response = $this->postJson('/attendance', [
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
}
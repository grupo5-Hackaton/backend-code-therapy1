<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testApirest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // public function test_a_Course_Can_Be_Created();
    // {
    //     factory(Course::class)->create();
    //     $response = $this->get('/api/courses');

    //     $response->assertJsonFragment();
    // }

    public function test_aCourseCanBeCreated(){
        

        $student = Course::factory()->create();
        $response = $this->post(('/courses'),
        [
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'email',
            'image' => 'image',
        ]);

        $this->assertCount(1,Course::all()); 
    }

    public function test_aCourseCanBeDeleted() {

        $course = Course::factory()->create();
        $this->assertCount(1, Course::all());

        $response = $this->delete();
        $this->assertCount(0, Course::all());
    }
    
    public function test_aCourseCanBeUpdated(){

        $course= Course::factory()->create();
        $this->assertCount(1,Course::all());

        $response=$this->patch(('/courses/{id}'), ['/courses/{id}']);
        $this->assertEquals('New name', Course::first()->name);

    }

    public function test_aCourseCanBeShowed(){
        $this->withExceptionHandling();
        
        $course=Course::factory()->create();
        $this->assertCount(1,Course::all());
        $response=$this->get('/courses/{id}');
        $response->assertSee($course->name);
        $response->assertSuccessful(200)->assertViewIs('/courses/{id}');
    }

};

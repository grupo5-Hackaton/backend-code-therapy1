<?php

namespace Tests\Unit;

/*use PHPUnit\Framework\TestCase;*/
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_the_user_can_see_the_course_page()
    {
        $response = $this->get('/course');

        $response->assertStatus(200);
    }
}

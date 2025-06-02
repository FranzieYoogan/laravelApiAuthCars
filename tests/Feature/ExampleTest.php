<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    public function test_it_creates_a_user_with_all_expected_fields(): void
    {
        $user = User::factory()->create();

        $this->assertNotNull($user->name);
        $this->assertNotNull($user->email);
        $this->assertNotNull($user->password);
        $this->assertNotNull($user->remember_token);
        $this->assertNotNull($user->created_at);
        $this->assertNotNull($user->updated_at);
    }
}

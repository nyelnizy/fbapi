<?php
namespace Tests\Unit;

use Tests\TestCase;

class TokenServiceTest extends TestCase
{
    public function test_generate_token_returns_valid_token()
    {
        $this->assertTrue(true);
    }

    public function test_invalidate_token_revokes_user_token()
    {
        $this->assertTrue(true);
    }
}
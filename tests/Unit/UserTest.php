<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_store_user()
    {
        $param = [
            "email" => "unit@testing.com",
            "password" => "testing",
            "name" => "unittes",
        ];
        $this->post('/api/user/store', $param)
            ->assertStatus(200);
    }

    public function test_email_user()
    {
        $param = ["email" => "unitesting@example.com"];
        $this->post('/api/user/email', $param)
            ->assertStatus(200);
    }

    public function tes_dologin_user()
    {
        $param = [
            "email" => "postman@example.com",
            "password" => "cobapostman",
        ];
        $this->post('/api/user/dologin')
            ->assertStatus(200);
    }
}

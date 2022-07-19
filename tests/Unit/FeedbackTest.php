<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class FeedbackTest extends TestCase
{
    public function test_lihat_feedback_arsip()
    {
        $id_arsip = 2;
        $this->get('/api/feedbackarsip/list/' . $id_arsip)
            ->assertStatus(200);
    }

    public function test_submit_feedback_arsip()
    {
        $id_arsip = 3;
        $param = [
            "user_id" => 3,
            "isi" => "coba unit testing",
        ];
        $this->post('/api/feedbackarsip/submit/' . $id_arsip, $param)
            ->assertStatus(200);
    }

    public function test_lihat_feedback_buku()
    {
        $id_buku = 10;
        $this->get('/api/feedbackbuku/list/' . $id_buku)
            ->assertStatus(200);
    }

    public function test_submit_feedback_buku()
    {
        $id_buku = 10;
        $param = [
            "user_id" => 4,
            "isi" => "tes unit testing",
        ];
        $this->post('/api/feedbackbuku/submit/' . $id_buku, $param)
            ->assertStatus(200);
    }
}

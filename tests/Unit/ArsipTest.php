<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Arsip;

class ArsipTest extends TestCase
{
    public function test_lihat_semua_arsip()
    {
        $this->get('/api/arsip/list')
            ->assertStatus(200);
    }

    public function test_cari_arsip()
    {
        $kw = ["keyword" => "ekonomi"];
        $this->post('/api/arsip/cari', $kw)
            ->assertStatus(200);
    }

    public function test_detail_arsip()
    {
        $id = 1;
        $this->get('/api/arsip/detail/' . $id)
            ->assertStatus(200);
    }

    public function test_totalcari_arsip()
    {
        $kw = ["keyword" => "ekonomi"];
        $this->post('/api/arsip/totalcari', $kw)
            ->assertStatus(200);
    }

    public function test_search_arsip()
    {
        $param = ["title" => "politik", "tahun" => 1970];

        $this->post('/api/arsip/search', $param)
            ->assertStatus(200);
    }

    public function test_tahun_arsip()
    {
        $tahun = 1970;
        $this->get('/api/arsip/tahun/' . $tahun)
            ->assertStatus(200);
    }
}

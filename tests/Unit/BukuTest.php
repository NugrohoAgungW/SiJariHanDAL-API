<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BukuTest extends TestCase
{
    public function test_lihat_semua_buku()
    {
        $this->get('/api/buku/list')
            ->assertStatus(200);
    }

    public function test_cari_buku()
    {
        $param = ["keyword" => "ekonomi"];
        $this->post('/api/buku/cari', $param)
            ->assertStatus(200);
    }

    public function test_totalcari_buku()
    {
        $param = ["keyword" => "ekonomi"];
        $this->post('/api/buku/totalcari', $param)
            ->assertStatus(200);
    }

    public function test_search_buku()
    {
        $param = [
            "judul" => "politik",
            "author" => "andrea",
            "publisher" => "media",
            "tahun" => 1970
        ];

        $this->post('/api/buku/search', $param)
            ->assertStatus(200);
    }

    public function test_detail_buku()
    {
        $id = 2;
        $this->get('/api/buku/detail/' . $id)
            ->assertStatus(200);
    }
}

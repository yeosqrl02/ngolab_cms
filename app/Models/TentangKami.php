<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'hero_video_url',
        'hero_image',

        'visi_title',
        'visi_description',
        'misi_title',
        'misi_description',
        'visimisi_image',

        'operasional_title',
        'operasional_description',
        'operasional_jam',
        'instagram_url',
        'wa_url',

        'gallery_img1',
        'gallery_img2',
        'gallery_img3',

        'lokasi_title',
        'lokasi_description',
        'lokasi_embed_map',
    ];
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    protected $guarded =[];
    // public static function findBySlug($slug) {
    //     return new Page([
    //         'title' => Str::title(str_replace('-', ' ', $slug)),
    //         'content' => 'testcontent',
    //         'slug' => $slug
    //     ]);
    // }
}

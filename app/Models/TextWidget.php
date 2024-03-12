<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidget extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'image',
        'title',
        'content',
        'active',
    ];

    public static function getTitle(string $key): string
    {
        $widgets = Cache::get('text-wiget-'.$key,function()use($key){
            return TextWidget::query()
            ->where('key', '=', $key)
            ->where('active', '=', 1)
            ->first();
        });
        if ($widgets) {
            return $widgets->title;
        }
        return '';
    }
    public static function getContent(string $key): string
    {
        $widgets = Cache::get('text-wiget-'.$key,function()use($key){
            return TextWidget::query()
            ->where('key', '=', $key)
            ->where('active', '=', 1)
            ->first();
        });
        if ($widgets) {
            return $widgets->content;
        }
        return '';
    }
}

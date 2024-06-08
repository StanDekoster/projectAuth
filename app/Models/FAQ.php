<?php

namespace App\Models;

use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'faqs_tags', 'faq_id', 'tag_id');
    }
}

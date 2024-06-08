<?php

namespace App\Models;
use App\Models\FAQ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public function faq()
    {
        return $this->belongsToMany(FAQ::class,'faqs_tags',  'tag_id','faq_id');
    }
}

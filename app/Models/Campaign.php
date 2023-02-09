<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'short_description', 'body', 'publish_date', 'status', 'goal', 'end_date', 'note', 'receiver', 'path_image', 'user_id'];

    public function category_campaign()
    {
        return $this->belongsToMany(Category::class, 'category_campaign');
    }
}

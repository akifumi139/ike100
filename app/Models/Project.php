<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'image',
        'title',
        'body',
        'level',
        'hurdle',
        'review',
        'status',
        'link',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function decodeYouTubeLink()
    {
        if (is_null($this->link) || strpos($this->link, 'https://www.youtube.com/embed/') === false) {
            return null;
        }
        return str_replace('https://www.youtube.com/embed/', 'https://youtu.be/', $this->link);
    }
}

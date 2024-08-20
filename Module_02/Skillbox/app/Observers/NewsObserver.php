<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * Handle the News "updated" event.
     */
    public function saving(News $news): void
    {
        $news->slug = Str::slug($news->title);
    }
}

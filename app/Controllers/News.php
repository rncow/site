<?php

namespace app\Controllers;

use app\Models\News as NewsModel;

class News
{
    public function getNews(int $languageID = 2)
    {
        $data = (new NewsModel)
            ->select('news_id', 'title', 'text', 'date')
            ->join('news_localized', 'news_id', 'id')
            ->where("language_id = $languageID")
            ->orderBy('date')
            ->get();

        echo render('read', ['news' => $data]);
    }

    public function main()
    {
        echo render('main');
    }
}
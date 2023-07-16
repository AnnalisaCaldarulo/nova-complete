<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\ArticlePerUser;
use App\Nova\Metrics\ArticleGoalPerWeek;

class ArticleInsights extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [

            new ArticlePerUser,
            new ArticleGoalPerWeek,
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'article-insights';
    }
}

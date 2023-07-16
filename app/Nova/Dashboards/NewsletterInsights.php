<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\SubscribersTrend;

class NewsletterInsights extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */

    public function name()
    {
        return 'Approfondimenti sulla newsletter';
    }
    public function cards()
    {
        return [
            new SubscribersTrend,
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'newsletter-insights';
    }
}

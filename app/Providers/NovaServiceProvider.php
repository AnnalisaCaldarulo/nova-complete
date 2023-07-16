<?php

namespace App\Providers;

use App\Nova\User;
use App\Nova\Article;
use Laravel\Nova\Nova;
use App\Nova\NewsletterUser;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use App\Models\Article as ModelArticle;
use App\Nova\Dashboards\ArticleInsights;
use App\Nova\Dashboards\NewsletterInsights;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\Lenses\MostProlificWirters;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // Nova::mainMenu(function(){
        //     return [
        //         MenuSection::make('Dashboards', [
        //                 MenuItem::dashboard(Main::class),
        //                 MenuItem::dashboard(ArticleInsights::class)
        //         ])->icon('view-grid'),
        //         MenuSection::make('Sezione utenti', [
    
        //             MenuItem::resource(User::class),
    
        //             // MenuItem::lens(User::class, MostProlificWriters::class),
    
        //             MenuItem::resource(NewsletterUser::class)
    
        //         ])->icon('user'),
    
            
        //         MenuSection::make('Sezione articoli', [

        //             MenuItem::resource(Article::class),

        //         ])->path('/resources/articles')

        //         ->withBadgeIf('Goal!', 'success', fn() => Article::where('created_at', '>=', now()->startOfWeek())->count() >= 10)

        //         ->icon('document-text'),

        //         MenuSection::make('Strumenti', [

        //             MenuItem::link('File Manager', '/nova-file-manager'),

        //         ])->icon('server'),
        //         ];
        // });
    }
   
    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->is_admin();
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
            new NewsletterInsights,
            new ArticleInsights

        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use App\Nova\Filters\IsPublished;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Metrics\ArticlePerUser;
use App\Nova\Metrics\ArticleGoalPerWeek;
use App\Nova\Filters\PublishingDateFilter;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

class Article extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Article>
     */
    public static $model = \App\Models\Article::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Titolo', 'title')->sortable()->rules('required', 'max:255'),
            Text::make('Sottotitolo', 'subtitle')->sortable()->rules('required', 'max:255'),
            Text::make('Testo', 'body')->rules('required', 'min:10'),
            Boolean::make('Pubblicat', 'is_published'),
            Date::make('Creato il', 'created_at')->onlyOnDetail(),
            Date::make('Modificato il', 'updated_at')->onlyOnDetail(),
            Slug::make('slug')->from('title'),
            Date::make('Pubblicato il', 'published_at'),
            Images::make('Gallery', 'gallery')->rules('required', 'max:5')
                ->conversionOnIndexView('thumb')
                ->rules('required', 'max:8'),
            // relazione
            BelongsTo::make('User', 'user', \App\Nova\User::class)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            new ArticlePerUser(),
            new ArticleGoalPerWeek()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [
            new IsPublished,

            new PublishingDateFilter,

        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}

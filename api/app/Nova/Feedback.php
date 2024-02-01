<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mostafaznv\NovaVideo\Video;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Feedback extends Resource
{

    use HasSortableRows;

    public static function canSort(NovaRequest $request, $resource)
    {
        return true;
    }

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Feedback>
     */
    public static $model = \App\Models\Feedback::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static function label()
    {
        return 'Обратная связь';
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return 'Обратная связь';
    }


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
            Text::make('Имя автора', 'authorname')->rules('max:32', 'required'),
            Text::make('Текст', 'text')->rules('max:256', 'required'),
            Video::make('Видео', 'video', '')->rules('file', 'max:150000', 'mimes:mp4', 'mimetypes:video/mp4'),
            Images::make('Превью для видео', 'images')
                ->conversionOnIndexView('thumb'),
            Images::make('Фотография', 'main')
                ->conversionOnIndexView('thumb'),
            Text::make('Источник', 'source')->rules('max:64', 'required'),
            URL::make('Ссылка на источник', 'source_url')->rules('required'),
            Boolean::make('Показывать', 'show')->rules('required'),
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
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
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

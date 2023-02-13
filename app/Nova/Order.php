<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Order>
     */
    public static $model = \App\Models\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
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
            Number::make('WC Order', 'wc_id'),
            Number::make('Order Number'),
            DateTime::make('Order Date', 'order_date'),
            Badge::make('status')->map([
                'draft' => 'warning',
                'canceled' => 'danger',
                'failed' => 'danger',
                'on-hold' => 'warning',
                'pending-payment' => 'warning',
                'processing' => 'warning',
                'refunded' => 'warning',
                'completed' => 'success',
            ]),
            Number::make('Shipping Total'),
            Number::make('Shipping Tax Total'),
            Number::make('Discount Total'),
            Number::make('Order Total'),
            Text::make('Order currency'),
            Text::make('Payment method'),
            Text::make('Shipping method'),
            Text::make('Billing First Name'),
            Text::make('Billing Last Name'),
            Text::make('Billing Company'),
            Text::make('Billing Email')
                ->rules('required', 'email', 'max:254')
                ->creationRules('email'),
            Text::make('Billing phone'),
            Textarea::make('Billing Address 1'),
            Textarea::make('Billing Address 2'),
            Number::make('Billing Postcode'),
            Text::make('Billing City'),
            Text::make('Billing State'),
            Text::make('Billing Country'),
            Text::make('shipping First Name'),
            Text::make('shipping Last Name'),
            Text::make('shipping Company'),
            Textarea::make('Shipping Address 1'),
            Textarea::make('Shipping Address 2'),
            Number::make('Shipping Postcode'),
            Text::make('Shipping City'),
            Text::make('Shipping State'),
            Text::make('Shipping Country'),
            // 
            BelongsTo::make('Customer'),
            BelongsTo::make('Device'),
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

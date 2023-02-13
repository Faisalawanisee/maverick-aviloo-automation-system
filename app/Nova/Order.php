<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
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

    // custom vars
    public static $statuses = [
        'checkout-draft' => 'Draft',
        'cancelled' => 'Cancelled',
        'failed' => 'Failed',
        'on-hold' => 'On Hold',
        'pending' => 'Pending Payment',
        'processing' => 'Processing',
        'refunded' => 'Refunded',
        'completed' => 'Completed',
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
            Number::make('WC Order', 'wc_id')->readonly(true),
            Number::make('Order Number')->readonly(true),
            Badge::make('status')->map([
                'checkout-draft' => 'warning',
                'cancelled' => 'danger',
                'failed' => 'danger',
                'on-hold' => 'warning',
                'pending' => 'warning',
                'processing' => 'warning',
                'refunded' => 'warning',
                'completed' => 'success',
            ])->labels(self::$statuses),
            Select::make('status')->options(self::$statuses)->onlyOnForms(),
            DateTime::make('Order Date', 'order_date')->readonly(true),
            Number::make('Discount Total')->readonly(true),
            Number::make('Total Tax')->readonly(true),
            Number::make('Shipping Total')->readonly(true),
            Number::make('Total')->readonly(true),
            Text::make('Payment method')->readonly(true),
            Text::make('Shipping method')->readonly(true),
            Text::make('Billing First Name')->readonly(true),
            Text::make('Billing Last Name')->readonly(true),
            Text::make('Billing Company')->readonly(true),
            Text::make('Billing Email')
                ->rules('required', 'email', 'max:254')
                ->creationRules('email')->readonly(true),
            Text::make('Billing phone')->readonly(true),
            Textarea::make('Billing Address 1')->readonly(true),
            Textarea::make('Billing Address 2')->readonly(true),
            Number::make('Billing Postcode')->readonly(true),
            Text::make('Billing City')->readonly(true),
            Text::make('Billing State')->readonly(true),
            Text::make('Billing Country')->readonly(true),
            Text::make('shipping First Name')->readonly(true),
            Text::make('shipping Last Name')->readonly(true),
            Text::make('shipping Company')->readonly(true),
            Textarea::make('Shipping Address 1')->readonly(true),
            Textarea::make('Shipping Address 2')->readonly(true),
            Number::make('Shipping Postcode')->readonly(true),
            Text::make('Shipping City')->readonly(true),
            Text::make('Shipping State')->readonly(true),
            Text::make('Shipping Country')->readonly(true),
            // 
            BelongsTo::make('Customer')->readonly(true),
            BelongsTo::make('Device')->readonly(true),
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

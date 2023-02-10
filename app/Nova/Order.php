<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\HasOne;
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
            DateTime::make('Order Date'),
            Badge::make('status')->map([
                'draft' => 'danger',
                'published' => 'success',
            ]),
            Number::make('Shipping Total'),
            Number::make('Shipping Tax Total'),
            Number::make('Fee Total'),
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
                ->creationRules('unique:users,email'),
            Number::make('billing_phone'),
            Textarea::make('billing_address_1'),
            Textarea::make('billing_address_2'),
            Number::make('billing_postcode'),
            Text::make('billing_city'),
            Text::make('billing_state'),
            Text::make('billing_country'),
            Text::make('shipping_first_name'),
            Text::make('shipping_last_name'),
            Text::make('shipping_company'),
            Textarea::make('shipping_address_1'),
            Textarea::make('shipping_address_2'),
            Number::make('shipping_postcode'),
            Text::make('shipping_city'),
            Text::make('shipping_state'),
            Text::make('shipping_country'),
            
            HasOne::make('Customer'),
            HasOne::make('Device'),
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

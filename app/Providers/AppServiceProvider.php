<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

use App\Models\CategoryModel;
use App\Http\Helper\Option;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap(); 

        $cate_parents = CategoryModel::where('status', 'active')->where('parent_id', 0)->get();
        View::share([
            'cate_parents' => $cate_parents,
            'options' => Option::getOption()
        ]);
    }
}

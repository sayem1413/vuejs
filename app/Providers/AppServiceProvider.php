<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('key','value');
        
        View::composer('frontEnd.includes.menu',function($view){
            //$publishedCategories = Category::where('publicationStatus',1)->get()->toJson();
            $publishedCategories = Category::where('publicationStatus',1)->get();
            $view->with('publishedCategories',$publishedCategories);
            /* $view->response()->json([
                'publishedCategories'=>$publishedCategories
            ],200); */
           /*  $view->with(response()->json([
                'publishedCategories'=>$publishedCategories
            ],200)); */
        });
        
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

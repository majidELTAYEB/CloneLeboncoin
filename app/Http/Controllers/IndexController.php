<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Blade;

    class IndexController
    {
        public function showIndex()
        {
            return Blade::render('dashboard');

        }

    }

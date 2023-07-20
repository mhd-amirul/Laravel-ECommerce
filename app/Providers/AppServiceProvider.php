<?php

namespace App\Providers;

use App\Repository\CartRepository;
use App\Repository\ContactRepository;
use App\Repository\Interfaces\CartRepositoryInterface;
use App\Repository\Interfaces\ContactRepositoryInterface;
use App\Repository\Interfaces\PasswordResetRepositoryInterface;
use App\Repository\Interfaces\ProductRepositoryInterface;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\PasswordResetRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use App\Services\AuthService;
use App\Services\CartService;
use App\Services\GeneralService;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\Interfaces\CartServiceInterface;
use App\Services\Interfaces\GeneralServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\ProfileServiceInterface;
use App\Services\ProductService;
use App\Services\ProfileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // services
        $this->app->bind(GeneralServiceInterface::class, GeneralService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(CartServiceInterface::class, CartService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProfileServiceInterface::class, ProfileService::class);
        
        // repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PasswordResetRepositoryInterface::class, PasswordResetRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

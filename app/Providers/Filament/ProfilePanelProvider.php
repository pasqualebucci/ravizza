<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationItem;


class ProfilePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('profile')
            ->path('profile')
            ->login()
            ->registration()
            ->passwordReset()
            ->profile(isSimple: false)
            ->colors([
                'primary' => Color::Pink,
                'gray' => Color::Slate,
            ])
            ->breadcrumbs(false)
            ->brandLogo(asset('images/logo/shirtly_black.svg'))
            ->darkModeBrandLogo(asset('images/logo/shirtly_white.svg'))
            ->navigationItems([
                NavigationItem::make('Torna al configuratore')
                    ->url(fn() => session()->get('previous_fabric_url', config('app.url')))
                    ->icon('heroicon-o-arrow-small-left')
                    ->sort(3),
            ])
            ->discoverResources(in: app_path('Filament/Profile/Resources'), for: 'App\\Filament\\Profile\\Resources')
            ->discoverPages(in: app_path('Filament/Profile/Pages'), for: 'App\\Filament\\Profile\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Profile/Widgets'), for: 'App\\Filament\\Profile\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

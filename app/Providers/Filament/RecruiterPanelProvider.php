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

class RecruiterPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('recruiter')
            ->path('recruiter')
            ->login()
            ->colors([
                'primary'   => Color::Blue,
                'gray'      => Color::Gray,
                'green'     => Color::Green,
                'red'       => Color::Red,
                'yellow'    => Color::Yellow,
                'blue'      => Color::Blue,
                'orange'    => Color::Orange,
                'darkgreen' => '#28a745',
                'purple'    => Color::Purple,
                'teal'      => Color::Teal,
            ])
            ->discoverResources(in: app_path('Filament/Recruiter/Resources'), for: 'App\\Filament\\Recruiter\\Resources')
            ->discoverPages(in: app_path('Filament/Recruiter/Pages'), for: 'App\\Filament\\Recruiter\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Recruiter/Widgets'), for: 'App\\Filament\\Recruiter\\Widgets')
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
            ])
            ->font('Rubik');
    }
}

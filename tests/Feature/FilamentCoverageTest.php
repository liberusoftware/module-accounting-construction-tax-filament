<?php

declare(strict_types=1);

use Filament\Panel;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Liberu\Accounting\ConstructionTaxFilament\ConstructionTaxFilamentPlugin;
use Liberu\Accounting\ConstructionTaxFilament\ConstructionTaxFilamentServiceProvider;

it('registers and configures accounting-construction-tax-filament filament resources', function (): void {
    $provider = $this->app->register(ConstructionTaxFilamentServiceProvider::class, force: true);
    if (method_exists($provider, 'boot')) { $provider->boot(); }
    expect($provider)->toBeInstanceOf(ConstructionTaxFilamentServiceProvider::class);
    $plugin = ConstructionTaxFilamentPlugin::make();
    $panel = Panel::make()->id('test-accounting-construction-tax-filament');
    $plugin->register($panel);
    $plugin->boot($panel);
    expect($plugin->getId())->toBeString()->not->toBeEmpty();
});

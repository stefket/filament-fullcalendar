<?php

use Filament\Support\Facades\FilamentAsset;
use Saade\FilamentFullCalendar\Data\EventData;

it('registers the package views', function () {
    expect(view()->exists('filament-fullcalendar::fullcalendar'))->toBeTrue();
});

it('registers the package assets', function () {
    $packages = ['saade/filament-fullcalendar'];

    $ids = fn (array $assets) => collect($assets)->map->getId()->all();

    expect($ids(FilamentAsset::getAlpineComponents($packages)))
        ->toContain('filament-fullcalendar-alpine')
        ->and($ids(FilamentAsset::getStyles($packages)))
        ->toContain('filament-fullcalendar-styles');
});

it('builds event data', function () {
    $event = EventData::make()
        ->id(1)
        ->title('Meeting')
        ->start('2026-01-01 10:00:00')
        ->end('2026-01-01 11:00:00')
        ->toArray();

    expect($event)->toMatchArray([
        'id' => 1,
        'title' => 'Meeting',
        'start' => '2026-01-01 10:00:00',
        'end' => '2026-01-01 11:00:00',
    ]);
});

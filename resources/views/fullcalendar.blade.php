@php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
    $headerActions = $this->getCachedHeaderActions();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        @if(count($headerActions))
            <div class="filament-fullcalendar-header-actions flex gap-2 justify-end flex-1 mb-4">
                @foreach($this->getCachedHeaderActions() as $action)
                    {{ $action }}
                @endforeach
            </div>
        @endif

        <div
            class="filament-fullcalendar"
            wire:ignore
            x-load
            x-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
            x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar'))]"
            x-data="fullcalendar({
                locale: @js($plugin->getLocale()),
                plugins: @js($plugin->getPlugins()),
                schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                timeZone: @js($plugin->getTimezone()),
                config: @js($this->getConfig()),
                editable: @json($plugin->isEditable()),
                selectable: @json($plugin->isSelectable()),
                eventClassNames: {!! htmlspecialchars($this->eventClassNames(), ENT_COMPAT) !!},
                eventContent: {!! htmlspecialchars($this->eventContent(), ENT_COMPAT) !!},
                eventDidMount: {!! htmlspecialchars($this->eventDidMount(), ENT_COMPAT) !!},
                eventWillUnmount: {!! htmlspecialchars($this->eventWillUnmount(), ENT_COMPAT) !!},
            })"
        >
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget>

<?php

namespace App\Filament\Pages;

use App\Models\SiteSeoSetting;
use App\Repositories\SettingRepository;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class WebsiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Website Settings';

    protected static ?string $title = 'Website Settings';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.website-settings';

    public ?array $data = [];

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return (bool) ($user?->is_admin || $user?->hasAnyRole(['Super Admin', 'Manager']));
    }

    public function mount(): void
    {
        $settings = app(SettingRepository::class)->all();
        $siteSeo = SiteSeoSetting::query()->first();

        $this->form->fill([
            'site_name' => $settings['site_name'] ?? $siteSeo?->organization_name ?? 'Natural Gem Store',
            'logo_path' => $settings['logo_path'] ?? $siteSeo?->logo_url ?? '/images/natural-gem-store-mark.svg',
            'logo_wordmark_path' => $settings['logo_wordmark_path'] ?? '/images/natural-gem-store-logo.svg',
            'contact_phone' => $settings['contact_phone'] ?? $siteSeo?->contact_phone ?? '+1 (647) 555-0199',
            'contact_email' => $settings['contact_email'] ?? $siteSeo?->contact_email ?? 'hello@naturalgem.com',
            'contact_address' => $settings['contact_address'] ?? $siteSeo?->address_line ?? 'Toronto, Ontario, Canada',
            'whatsapp' => $settings['whatsapp'] ?? $settings['contact_phone'] ?? $siteSeo?->contact_phone ?? '+1 (647) 555-0199',
            'tax_note' => $settings['tax_note'] ?? 'GST/HST is calculated at checkout based on your province.',
            'city' => $siteSeo?->city ?? 'Toronto',
            'province' => $siteSeo?->province ?? 'Ontario',
            'postal_code' => $siteSeo?->postal_code,
            'country' => $siteSeo?->country ?? 'CA',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Brand')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->label('Company Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('logo_path')
                            ->label('Logo URL or Path')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Use a full URL or a public path like /images/logo.svg'),
                        Forms\Components\TextInput::make('logo_wordmark_path')
                            ->label('Wordmark Logo URL or Path')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Used in the header on desktop. Example: /images/natural-gem-store-logo.svg'),
                    ])->columns(2),

                Forms\Components\Section::make('Contact')
                    ->schema([
                        Forms\Components\TextInput::make('contact_phone')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_address')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('city')->maxLength(255),
                        Forms\Components\TextInput::make('province')->maxLength(255),
                        Forms\Components\TextInput::make('postal_code')->maxLength(255),
                        Forms\Components\TextInput::make('country')->maxLength(20),
                    ])->columns(2),

                Forms\Components\Section::make('Commerce')
                    ->schema([
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp / Call Number')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('tax_note')
                            ->label('Tax Note')
                            ->rows(2)
                            ->maxLength(255),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();

        app(SettingRepository::class)->updateMany([
            'site_name' => $state['site_name'],
            'logo_path' => $state['logo_path'],
            'logo_wordmark_path' => $state['logo_wordmark_path'],
            'contact_phone' => $state['contact_phone'],
            'contact_email' => $state['contact_email'],
            'contact_address' => $state['contact_address'],
            'whatsapp' => $state['whatsapp'] ?? $state['contact_phone'],
            'tax_note' => $state['tax_note'],
        ]);

        SiteSeoSetting::updateOrCreate(
            ['id' => 1],
            [
                'organization_name' => $state['site_name'],
                'site_url' => rtrim(config('app.url'), '/'),
                'logo_url' => $state['logo_path'],
                'contact_phone' => $state['contact_phone'],
                'contact_email' => $state['contact_email'],
                'address_line' => $state['contact_address'],
                'city' => $state['city'] ?? 'Toronto',
                'province' => $state['province'] ?? 'Ontario',
                'postal_code' => $state['postal_code'],
                'country' => $state['country'] ?? 'CA',
            ]
        );

        Notification::make()
            ->title('Website settings saved')
            ->success()
            ->send();
    }
}

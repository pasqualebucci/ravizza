<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use App\Models\Setting;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\Tabs;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Notifications\Notification;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-wrench';
    protected static ?string $title = 'Settings';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.settings';


    public array $data = []; // Per memorizzare i dati del form

    public function mount()
    {
        $head = Setting::first();

        $this->data = [
            'company_name' => $head->company_name ?? '',
            'address' => $head->address ?? '',
            'citta' => $head->citta ?? '',
            'provincia' => $head->provincia ?? '',
            'cap' => $head->cap ?? '',
            'vat_number' => $head->vat_number ?? '',
            'phone' => $head->phone ?? '',
            'email' => $head->email ?? '',
            'head_scripts' => $head->head_scripts ?? '',
            'body_scripts' => $head->body_scripts ?? '',
            'footer_scripts' => $head->footer_scripts ?? '',
            'prezzo_iniziali_completo' => $head->prezzo_iniziali_completo ?? 0,
            'prezzo_iniziali_per_lettera' => $head->prezzo_iniziali_per_lettera ?? 0,
            'prezzo_iniziali_tipo' => $head->prezzo_iniziali_tipo ?? 'completo',
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('Generale')
                        ->columns(2)
                        ->schema([
                            Forms\Components\TextInput::make('data.company_name')
                                ->label('Azienda'),
                            Forms\Components\TextInput::make('data.address')
                                ->label('Indirizzo'),
                            Forms\Components\TextInput::make('data.citta')
                                ->label('Città'),
                            Forms\Components\TextInput::make('data.provincia')
                                ->label('Provincia'),
                            Forms\Components\TextInput::make('data.cap')
                                ->label('CAP'),
                            Forms\Components\TextInput::make('data.vat_number')
                                ->label('Partita IVA'),
                            Forms\Components\TextInput::make('data.phone')
                                ->label('Telefono'),
                            Forms\Components\TextInput::make('data.email')
                                ->email()
                                ->label('Email'),
                        ]),
                    
                    Tabs\Tab::make('Scripts')
                        ->schema([
                            Forms\Components\Textarea::make('data.head_scripts')
                                ->label('Header'),
                            Forms\Components\Textarea::make('data.body_scripts')
                                ->label('Body'),
                            Forms\Components\Textarea::make('data.footer_scripts')
                                ->label('Footer'),
                        ]),
                    Tabs\Tab::make('Iniziali')
                        ->columns(3)
                        ->schema([
                            Forms\Components\TextInput::make('data.prezzo_iniziali_completo')
                                ->label('Prezzo iniziali')
                                ->prefix('€')
                                ->numeric()
                                ->inputMode('decimal'),
                            Forms\Components\TextInput::make('data.prezzo_iniziali_per_lettera')
                                ->label('Prezzo iniziali per lettera')
                                ->prefix('€')
                                ->numeric()
                                ->inputMode('decimal'),
                            Forms\Components\Select::make('data.prezzo_iniziali_tipo')
                                ->label('Tipo prezzo iniziali')
                                ->options([
                                    'completo' => 'Prezzo iniziali',
                                    'lettera' => 'Prezzo iniziali per lettera',
                                ])
                        ]),
                ]),
        ];
    }

    public function submit()
    {
        // Remove the debug statement
        // dd($this->data['prezzo_iniziali_tipo']);

        // Update or create the settings
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => $this->data['company_name'],
                'address' => $this->data['address'],
                'citta' => $this->data['citta'],
                'provincia' => $this->data['provincia'],
                'cap' => $this->data['cap'],
                'vat_number' => $this->data['vat_number'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email'],
                'head_scripts' => $this->data['head_scripts'],
                'body_scripts' => $this->data['body_scripts'],
                'footer_scripts' => $this->data['footer_scripts'],
                'prezzo_iniziali_completo' => $this->data['prezzo_iniziali_completo'],
                'prezzo_iniziali_per_lettera' => $this->data['prezzo_iniziali_per_lettera'],
                'prezzo_iniziali_tipo' => $this->data['prezzo_iniziali_tipo']
            ]
        );

        Notification::make()
            ->title('Salvato!')
            ->success()
            ->send();
    }

    protected function getActions(): array
    {
        return [
            Action::make('Salva')
                ->button()
                ->label('Salva')
                ->action('submit'),
        ];
    }
}

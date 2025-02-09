<?php

namespace App\Filament\Recruiter\Pages;

use App\Models\Recruiter;
use App\Traits\HasTranslatedLabels;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class EditRecruiter extends Page implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.recruiter.pages.edit-recruiter';

    protected static ?string $navigationLabel = 'تعديل البيانات';

    public ?array $data = [];

    public $record;
    public function mount()
    {
        $this->record = Recruiter::find(auth()->user()->recruiter->id);
        $this->form->fill([
            'company_name' => $this->record->company_name,
            'company_website' => $this->record->company_website,
            'phone_number' => $this->record->phone_number,
            'address' => $this->record->address,
            'city' => $this->record->city,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->model($this->record)
            ->schema([
                Section::make()
                    ->heading(__('Edit Info'))
                    ->schema([
                            TextInput::make('company_name')
                                ->label('Company Name')
                                ->translateLabel()
                                ->required(),

                            TextInput::make('company_website')
                                ->label('Company Website')
                                ->translateLabel()
                                ->nullable()
                                ->url(),

                            TextInput::make('phone_number')
                                ->label('Phone')
                                ->translateLabel()
                                ->required()
                                ->regex('/^(091|092|093|094)\d{7}$/'),

                            TextInput::make('address')
                                ->label('Address')
                                ->translateLabel()
                                ->required(),

                            TextInput::make('city')
                                ->label('City')
                                ->translateLabel()
                                ->required(),

                            FileUpload::make('logo')
                                ->label('Logo')
                                ->translateLabel()
                                ->disk('public') // Specify the disk to store files
                                ->directory('logo') // Optional: Specify a directory
                                ->preserveFilenames() // Optional: Keep original filenames
                                ->acceptedFileTypes(['image/*']),

                            Actions::make([
                                Action::make('save')
                                    ->label('Save')
                                    ->translateLabel()
                                    ->action(function () {
                                        $this->validate();
                                        $data = collect($this->data);
                                        $data = $data->except('logo')->toArray();
                                        $this->record->update($data);

                                        if($this->data['logo']) {
                                            $this->record->clearMediaCollectionExcept('logo');

                                            $file = collect($this->data['logo'])->first();

                                            $this->record->addMedia($file->getRealPath())->toMediaCollection('logo');
                                        }

                                        Notification::make()
                                            ->title('تم الحفظ')
                                            ->success()
                                            ->send();
                                    })
                            ])
                        ])
            ]);
    }

}

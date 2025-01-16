<?php

namespace App\Livewire;

use App\Models\JobPost;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\TranslatableContentDriver;
use Filament\Support\Enums\ActionSize;
use Livewire\Component;

class JobDetails extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public JobPost $record;

    public function mount($record): void
    {
        $this->record = $record;
    }

    public function applyAction(): Action
    {
        return Action::make('apply')
            ->label(function ($arguments) {
                if($arguments['viewMode']) {
                    return "Apply Job";
                }

                return "See Details";
            })
            ->translateLabel()
            ->requiresConfirmation()
            ->color(function ($arguments) {
                if($arguments['viewMode']) {
                    return Color::Red;
                }

                return Color::Teal;
            })
            ->size(ActionSize::ExtraLarge)
            ->extraAttributes([
                'class' => 'w-56',
            ])
            ->fillForm(function ($arguments) {
                if($arguments['viewMode']) {
                    return;
                }

                $user = auth()->user();
                $jobApplication = $user->applications()->where('job_post_id', $this->record->id)->first();
                return $jobApplication->attributesToArray();
            })
            ->form([
                Fieldset::make()
                    ->schema([
                        TextInput::make('first_name')
                            ->label('First Name')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('middle_name')
                            ->label('Middle Name')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('last_name')
                            ->label('Last Name')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('email')
                            ->label('Email')
                            ->translateLabel()
                            ->required()
                            ->email()
                            ->columnSpan('full'),

                        TextInput::make('phone')
                            ->label('Phone')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->columnSpan('full'),

                        TextInput::make('years_of_experience')
                            ->label('Years of Experience')
                            ->translateLabel()
                            ->numeric()
                            ->columnSpan('full'),

                        TextInput::make('expected_salary')
                            ->label('Expected Salary')
                            ->translateLabel()
                            ->numeric()
                            ->columnSpan('full'),

                        TextInput::make('place_of_residence')
                            ->label('Place of Residence')
                            ->translateLabel()
                            ->columnSpan('full'),

                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full'),

                        RichEditor::make('cover_letter')
                            ->label('Cover Letter')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full'),

                        SpatieMediaLibraryFileUpload::make('attachments')
                            ->label('Attachments')
                            ->translateLabel()
                            ->collection('attachments')
                            ->multiple()
                            ->columnSpan('full'),

                        Hidden::make('user_id')
                            ->default(auth()->id()),

                        Hidden::make('job_post_id')
                            ->default($this->record->id),
                    ])
                    ->columns(3)
            ])
            ->disabledForm(function ($arguments) {
                if($arguments['viewMode']) {
                    return false;
                }

               return true;
            })
            ->modalWidth('3xl')
            ->modalSubmitAction(function($arguments) {
                if($arguments['viewMode']) {
                    return;
                }
                return false;
            })
            ->action(function ($data) {
                $this->record->applications()->create($data);
            });
    }

    public function cancelApplicationAction()
    {
        return Action::make('cancelApplication')
            ->label('Cancel Application')
            ->translateLabel()
            ->requiresConfirmation()
            ->size(ActionSize::ExtraLarge)
            ->color(Color::Red)
            ->action(function () {
                $user = auth()->user();
                $jobApplication = $user->applications()->where('job_post_id', $this->record->id)->first();
                $jobApplication->delete();
            });
    }

    public function render()
    {
        return view('livewire.job-details');
    }
}

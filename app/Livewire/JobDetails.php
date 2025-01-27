<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\JobApplication;
use App\Models\JobPost;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\TranslatableContentDriver;
use Filament\Support\Enums\ActionSize;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

#[AllowDynamicProperties]
class JobDetails extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public JobPost $record;
    public $application;
    public $attachments;

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
            ->model(JobApplication::class)
            ->form([
                Fieldset::make()
                    ->schema([
                        TextInput::make('first_name')
                            ->label('First Name')
                            ->translateLabel()
                            ->required()
                            ->maxLength(100)
                            ->placeholder('أدخل اسمك الأول'),

                        TextInput::make('middle_name')
                            ->label('Middle Name')
                            ->translateLabel()
                            ->required()
                            ->maxLength(100)
                            ->placeholder('أدخل اسمك الأوسط'),

                        TextInput::make('last_name')
                            ->label('Last Name')
                            ->translateLabel()
                            ->required()
                            ->maxLength(100)
                            ->placeholder('أدخل اسمك الأخير'),

                        TextInput::make('email')
                            ->label('Email')
                            ->translateLabel()
                            ->required()
                            ->email()
                            ->columnSpan('full')
                            ->placeholder('e.g. example@gmail.com'),

                        TextInput::make('phone')
                            ->label('Phone')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->regex('/^09[1-4]\d{7}$/')
                            ->maxLength(10)
                            ->columnSpan('full')
                            ->placeholder('أدخل رقم هاتفك'),

                        TextInput::make('years_of_experience')
                            ->label('Years of Experience')
                            ->translateLabel()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->columnSpan('full')
                            ->placeholder('أدخل عدد سنوات الخبرة'),

                        TextInput::make('expected_salary')
                            ->label('Expected Salary')
                            ->translateLabel()
                            ->numeric()
                            ->minValue(0)
                            ->columnSpan('full')
                            ->placeholder('أدخل الراتب المتوقع'),

                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->translateLabel()
                            ->required()
                            ->maxDate(now()->subYears(5))
                            ->columnSpan('full')
                            ->placeholder('اختر تاريخ ميلادك'),

                        RichEditor::make('cover_letter')
                            ->label('Cover Letter')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full')
                            ->placeholder('اكتب رسالة التغطية الخاصة بك، موضحًا سبب اهتمامك بالوظيفة ومهاراتك وخبراتك ذات الصلة'),
                        FileUpload::make('attachments')
                            ->label('Attachments')
                            ->translateLabel()
                            ->multiple()
                            ->disk('public') // Specify the disk to store files
                            ->directory('attachments') // Optional: Specify a directory
                            ->preserveFilenames() // Optional: Keep original filenames
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
                $data = collect($data);

                // Create the job application record without attachments
                $application = $this->record->applications()->create($data->except('attachments')->toArray());

                // Check if attachments exist and process them
                if (isset($data['attachments']) && is_array($data['attachments'])) {
                    foreach ($data['attachments'] as $filePath) {
                        // Get the absolute path to the file
                        $absolutePath = Storage::disk('public')->path($filePath);

                        // Ensure the file exists before adding to media collection
                        if (file_exists($absolutePath)) {
                            $application->addMedia($absolutePath)->toMediaCollection('attachments');
                        }
                    }
                }
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

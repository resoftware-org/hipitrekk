<?php
use function Laravel\Folio\{middleware, name};
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

use Filament\Forms\Components\{Textarea, TextInput, DatePicker};
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

middleware('auth');
name('journeys.create');

new class extends Component implements HasForms {
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([TextInput::make('name')->required()->maxLength(255), Textarea::make('description')->maxLength(1000), DatePicker::make('start_date'), DatePicker::make('end_date')->after('start_date')])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();

        auth()->user()->journeys()->create($data);

        $this->form->fill();

        Notification::make()->success()->title('Journey created successfully')->send();

        $this->redirect(route('journeys'));
    }
};
?>

<x-layouts.app>
    @volt('journeys.create')
        <x-app.container class="max-w-xl">
            <x-elements.back-button class="mx-auto mb-3 max-w-full" text="Back to Journeys" :href="route('journeys')" />

            <div class="mb-3 flex items-center justify-between">
                <x-app.heading title="New Journey" description="Fill out the form below to create a new journey"
                    :border="false" />
            </div>

            <form wire:submit="create" class="space-y-6">
                {{ $this->form }}
                <div class="flex justify-end gap-x-3">
                    <x-button tag="a" href="{{ route('journeys') }}" color="secondary">Cancel</x-button>
                    <x-button type="submit" class="bg-primary-600 text-white hover:bg-primary-500">
                        Create Journey
                    </x-button>
                </div>
            </form>
        </x-app.container>
    @endvolt
</x-layouts.app>

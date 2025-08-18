<?php
use Illuminate\Database\Eloquent\Relations\HasMany;
use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use App\Models\Journey;

use Filament\Forms\Components\{Textarea, TextInput, DatePicker};
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\{Table, Concerns\InteractsWithTable, Contracts\HasTable, Actions\Action, Actions\CreateAction, Actions\DeleteAction, Actions\EditAction, Actions\ViewAction, Columns\TextColumn};

middleware('auth');
name('journeys');

new class extends Component implements HasForms, HasTable {
    use InteractsWithForms, InteractsWithTable;

    public ?array $data = [];

    public function table(Table $table): Table
    {
        return $table
            ->relationship(fn(): HasMany => auth()->user()->journeys())
            ->columns([TextColumn::make('name')->searchable()->sortable(), TextColumn::make('description')->limit(50)->searchable(), TextColumn::make('start_date')->date()->sortable(), TextColumn::make('end_date')->date()->sortable(), TextColumn::make('created_at')->dateTime()->sortable()->toggleable()])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('No journeys yet')
            ->emptyStateDescription('Once you add your first journey, it will appear here.')
            ->emptyStateActions([Action::make('create')->label('Create journey')->url(route('journeys.create'))->icon('heroicon-m-plus')->button()])
            ->queryStringIdentifier('journeys')
            ->extremePaginationLinks()
            ->actions([
                ViewAction::make()
                    ->slideOver()
                    ->modalWidth('md')
                    ->form([TextInput::make('name')->disabled(), Textarea::make('description')->disabled(), DatePicker::make('start_date')->disabled(), DatePicker::make('end_date')->disabled()]),
                EditAction::make()
                    ->slideOver()
                    ->modalWidth('md')
                    ->form([TextInput::make('name')->required()->maxLength(255), Textarea::make('description')->maxLength(1000), DatePicker::make('start_date'), DatePicker::make('end_date')->after('start_date')]),
                DeleteAction::make()
                    ->after(function () {
                        Notification::make()->success()->title('Journey deleted')->send();
                    })
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        return $data;
                    })
                    ->after(function () {
                        Notification::make()->success()->title('Journey created')->send();
                    }),
            ])
            ->filters([
                // Add any filters you want here
            ])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }
};
?>

<x-layouts.app>
    @volt('journeys')
        <x-app.container>
            <div class="mb-5 flex items-center justify-between">
                <x-app.heading title="Journeys" description="Check out your journeys below" :border="false" />
                <x-button tag="a" href="/journeys/create">New Journey</x-button>
            </div>

            <div class="overflow-x-auto rounded-lg border">
                {{ $this->table }}
            </div>
        </x-app.container>
    @endvolt
</x-layouts.app>

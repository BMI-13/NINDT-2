<?php

namespace App\Livewire;

use App\Models\V1CarDetailsLog;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class V1CarTAble extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return V1CarDetailsLog::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('provider')
            ->add('jobid')
            ->add('uniqueid')
            ->add('site_url')
            ->add('details')
            ->add('manufacturer')
            ->add('model')
            ->add('yom')
            ->add('yor')
            ->add('mileage')
            ->add('amount')
            ->add('contact')
            ->add('fueltype')
            ->add('gear')
            ->add('posted_on_formatted', fn (V1CarDetailsLog $model) => Carbon::parse($model->posted_on)->format('d/m/Y H:i:s'))
            ->add('title')
            ->add('options')
            ->add('condion')
            ->add('location')
            ->add('location_group')
            ->add('status')
            ->add('job_url')
            ->add('log')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Provider', 'provider')
                ->sortable()
                ->searchable(),

            Column::make('Jobid', 'jobid')
                ->sortable()
                ->searchable(),

            Column::make('Uniqueid', 'uniqueid')
                ->sortable()
                ->searchable(),

            Column::make('Site url', 'site_url')
                ->sortable()
                ->searchable(),

            Column::make('Details', 'details')
                ->sortable()
                ->searchable(),

            Column::make('Manufacturer', 'manufacturer')
                ->sortable()
                ->searchable(),

            Column::make('Model', 'model')
                ->sortable()
                ->searchable(),

            Column::make('Yom', 'yom'),
            Column::make('Yor', 'yor'),
            Column::make('Mileage', 'mileage')
                ->sortable()
                ->searchable(),

            Column::make('Amount', 'amount')
                ->sortable()
                ->searchable(),

            Column::make('Contact', 'contact')
                ->sortable()
                ->searchable(),

            Column::make('Fueltype', 'fueltype')
                ->sortable()
                ->searchable(),

            Column::make('Gear', 'gear')
                ->sortable()
                ->searchable(),

            Column::make('Posted on', 'posted_on_formatted', 'posted_on')
                ->sortable(),

            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Options', 'options')
                ->sortable()
                ->searchable(),

            Column::make('Condion', 'condion')
                ->sortable()
                ->searchable(),

            Column::make('Location', 'location')
                ->sortable()
                ->searchable(),

            Column::make('Location group', 'location_group')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Job url', 'job_url')
                ->sortable()
                ->searchable(),

            Column::make('Log', 'log')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('posted_on'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(V1CarDetailsLog $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}

<?php

namespace App\DataTables;

use App\Models\Archive;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArchivesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $showUrl = route('archives.show', $row->id);
                $editUrl = route('archives.edit', $row->id);
                $deleteUrl = route('archives.destroy', $row->id);
                return '<a href="'.$showUrl.'" class="btn btn-sm btn-primary" style="width: 80px;">Show</a>
                <a href="'.$editUrl.'" class="btn btn-sm btn-warning" style="width: 80px;">Edit</a>
                <form action="'.$deleteUrl.'" method="POST" style="display:inline;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger" style="width: 80px;">Delete</button>
                </form>';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Archive $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('booking.buyer', 'booking.property')
        ->select('*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('archives-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('booking.buyer.nama_lengkap')
                ->title('Nama Lengkap'),
            Column::make('booking.property.type')
                ->title('Type'),
            Column::make('booking.property.blok')
                ->title('Blok'),
            Column::make('booking.property.harga')
                ->title('Harga'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Archives_' . date('YmdHis');
    }
}

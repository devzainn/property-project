<?php

namespace App\DataTables;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookingsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */

     public function dataTable(QueryBuilder $query): EloquentDataTable
{
    return (new EloquentDataTable($query))
        ->addColumn('action', function($row){
            $showUrl = route('bookings.show', $row->booking_id);
            $editUrl = route('bookings.edit', $row->booking_id);
            $deleteUrl = route('bookings.destroy', $row->booking_id);

            if ($row->status_pengajuan != 'accepted') {
                $acceptUrl = route('bookings.accept', $row->booking_id);
                return '<a href="'.$showUrl.'" class="btn btn-sm btn-primary" style="width: 80px;">Show</a>
                        <a href="'.$editUrl.'" class="btn btn-sm btn-warning" style="width: 80px;">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger" style="width: 80px;">Delete</button>
                        </form>

                        <form action="'.$acceptUrl.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-sm btn-success" style="width: 80px;">Accept</button>
                        </form>';
            } else {
                return '<a href="'.$showUrl.'" class="btn btn-sm btn-primary" style="width: 80px;">Show</a>';
            }
        })
        ->setRowId('id');
}



    /**
     * Get the query source of dataTable.
     */
    public function query(Booking $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bookings-table')
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
            Column::make('booking_id'),
            Column::make('nama_marketing'),
            Column::make('status_pengajuan'),
            Column::make('penawaran_harga'),
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
        return 'Bookings_' . date('YmdHis');
    }
}

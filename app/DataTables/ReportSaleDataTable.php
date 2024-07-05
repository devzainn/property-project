<?php

namespace App\DataTables;

use App\Models\ReportSale;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReportSaleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', function($row){
    //         })
    //         ->setRowId('id');
    // }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ReportSale $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('booking.buyer', 'booking.property')
        ->select('*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('reportsale-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('id')
                ->title('ID')
                ->addClass('text-center'),
            Column::make('booking.buyer.nama_lengkap')
                ->title('Nama Lengkap'),
            Column::make('booking.property.type')
                ->title('Type'),
            Column::make('booking.property.blok')
                ->title('Blok'),
            Column::make('booking.property.harga')
                ->title('Harga'),
            Column::make('booking.nama_marketing')
                ->title('Nama Marketing'),
            Column::make('booking.tgl_booking')
                ->title('Tanggal Booking'),
            Column::make('tgl_diterima')
                ->title('Tanggal Diterima'),
            // Column::computed('action')
            // ->exportable(false)
            // ->printable(false)
            // ->width(60)
            // ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ReportSales_' . date('YmdHis');
    }
}

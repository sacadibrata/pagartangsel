<?php

namespace App\Exports;

use App\Models\Pendataan;
use App\Models\PendataanAll;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomPendataansByDateExport implements FromView
{
    protected $tanggalFilter;

    public function __construct($tanggalFilter)
    {
        $this->tanggalFilter = $tanggalFilter;
    }

    public function view(): View
    {
        return view('backend.admin.export.pendataans', [
            'pendataans' => PendataanAll::with(['komoditas.kategori', 'komoditas.satuan'])
            ->where('tanggal_input', $this->tanggalFilter)
            ->get(),
            'tanggalInput' => $this->tanggalFilter,
        ]);
    }
}

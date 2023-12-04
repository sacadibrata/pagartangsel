<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasSerpong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanHargaPilihTanggalSerpong implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {

        // Calculate the range of dates between startDate and endDate
        $dates = [];
        $currentDate = $this->startDate;
        while ($currentDate <= $this->endDate) {
            $dates[] = $currentDate;
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }

        // Fetch data for the specified date range

        $komoditas = KomoditasSerpong::whereHas('pendataanserpong', function ($query) {
            $query->whereBetween('tanggal_input', [$this->startDate, $this->endDate]);
        })
        ->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_serpong.export.laporanhargatanggalserpong', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
            'dates' => $dates, // Add $dates to the view data
        ]);
    }
}

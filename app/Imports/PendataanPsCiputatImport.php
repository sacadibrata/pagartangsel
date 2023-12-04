<?php

namespace App\Imports;

use App\Models\Komoditas;
use App\Models\KomoditasCiputat;
use App\Models\Pasar;
use App\Models\Pendataan;
use App\Models\PendataanAll;
use App\Models\PendataanPsCiputat;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class PendataanPsCiputatImport implements ToModel, WithHeadingRow
{

    protected $tanggalInput;
    protected $surveyor;
    protected $pasar;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct($tanggalInput,$surveyor,$pasar)
    {
        $this->tanggalInput = $tanggalInput;
        $this->surveyor = $surveyor;
        $this->pasar = $pasar;
        // Mengubah format baris judul menjadi 'none' agar diabaikan
        HeadingRowFormatter::default('none');
    }

    public function model(array $row)
    {
        // Get or create Komoditas based on the name from Excel
        $komoditasName = $row['Komoditas']; // Assuming kolom 'komoditas' ada di indeks 3
        $komoditas = KomoditasCiputat::firstOrCreate(['nama_komoditas' => $komoditasName]);

        return new PendataanPsCiputat([
            'surveyor_id' => $this->surveyor,
            'pasar_id' => $this->pasar,
            'tanggal_input' => $this->tanggalInput,
            'komoditas_id' => $komoditas->id,
            'harga_pedagang_1' => $row['Harga Pedagang 1'],
            'harga_pedagang_2' => $row['Harga Pedagang 2'],
            'harga_pedagang_3' => $row['Harga Pedagang 3'],
            'average_harga' => $row['Harga Rata-Rata'],
        ]);
    }
}

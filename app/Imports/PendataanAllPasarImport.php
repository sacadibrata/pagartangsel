<?php

namespace App\Imports;

use App\Models\Komoditas;
use App\Models\KomoditasSemuaPasar;
use App\Models\Pasar;
use App\Models\Pendataan;
use App\Models\PendataanAll;
use App\Models\PendataanHargaSemuaPasar;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class PendataanAllPasarImport implements ToModel, WithHeadingRow
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
        $komoditas = KomoditasSemuaPasar::firstOrCreate(['nama_komoditas' => $komoditasName]);

        return new PendataanHargaSemuaPasar([
            'surveyor_id' => $this->surveyor,
            'pasar_id' => $this->pasar,
            'tanggal_input' => $this->tanggalInput,
            'komoditas_id' => $komoditas->id,
            'pendataan_ps_cegers_id' => $row['Pasar Ceger'],
            'pendataan_ps_cimanggis_id' => $row['Pasar Cimanggis'],
            'pendataan_ps_ciputats_id' => $row['Pasar Ciputat'],
            'pendataan_ps_jengkols_id' => $row['Pasar Jengkol'],
            'pendataan_ps_jombangs_id' => $row['Pasar Jombang'],
            'pendataan_ps_serpongs_id' => $row['Pasar Serpong'],
            'average_harga' => $row['Harga Rata-Rata'],
        ]);
    }
}

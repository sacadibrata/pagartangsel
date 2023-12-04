<?php

namespace App\Http\Controllers;

use App\Imports\CustomPendataansImport;
use App\Imports\PendataanPsCiputatImport;
use App\Imports\PendataanPsSerpongImport;
use App\Models\DataSurveyor;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportPsSerpongController extends Controller
{
    public function importFormSerpong()
    {
        $user = auth()->user();
        $pasars = DataSurveyor::where('user_id',$user->id)->first();
        return view('backend.pasar_serpong.import.form', compact('pasars'), ['title' => 'UPLOAD DATA']);
    }

    public function importDataSerpong(Request $request)
    {
        // Validasi file Excel
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
            'tanggal_input' => 'required|date', // Tambahkan validasi tanggal_input
            'surveyor_id' => 'required', // Sesuaikan dengan aturan validasi yang diperlukan
            'pasar_id' => 'required', // Sesuaikan dengan aturan validasi yang diperlukan
        ]);

        // Simpan file Excel ke direktori yang sesuai
        $file = $request->file('file')->store('import', 'public');

        // Gunakan Maatwebsite/Laravel-Excel untuk mengimpor data
        $tanggalInput = Carbon::parse($request->input('tanggal_input'));
        $surveyor = $request->input('surveyor_id');
        $pasar = $request->input('pasar_id');

        $import = new PendataanPsSerpongImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormSerpong')->with('success', 'Data berhasil diimpor.');
    }

    public function getSurveyor($id)
    {
        $dataSurveyors = DB :: table('data_surveyors')
                        ->join('users', 'data_surveyors.user_id','users.id')
                        ->where('data_surveyors.pasar_id', $id)
                        ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
                        ->get();
        return response()->json($dataSurveyors);
    }
}

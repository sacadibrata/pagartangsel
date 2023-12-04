<?php

namespace App\Http\Controllers;

use App\Imports\PendataanAllPasarImport;
use App\Imports\PendataanPsCegerImport;
use App\Imports\PendataanPsCimanggisImport;
use App\Imports\PendataanPsCiputatImport;
use App\Imports\PendataanPsJengkolImport;
use App\Imports\PendataanPsJombangImport;
use App\Imports\PendataanPsSerpongImport;
use App\Models\Pasar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportAllController extends Controller
{
    public function importFormAll()
    {
        $pasars = Pasar ::all();
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formAll', compact('pasars','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importFormPsCeger()
    {
        $pasars = Pasar ::all()->where('id','2');
        $users = Auth()->user();
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formCeger', compact('users','pasars','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importFormPsCiputat()
    {
        $users = Auth()->user();
        $pasars = Pasar ::all()->where('id','4');
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formCiputat', compact('pasars','users','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importFormPsJengkol()
    {
        $users = Auth()->user();
        $pasars = Pasar ::all()->where('id','5');
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formJengkol', compact('pasars','users','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importFormPsCimanggis()
    {
        $users = Auth()->user();
        $pasars = Pasar ::all()->where('id','3');
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formCimanggis', compact('pasars','users','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importFormPsJombang()
    {
        $users = Auth()->user();
        $pasars = Pasar ::all()->where('id','6');
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formJombang', compact('pasars','users','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importFormPsSerpong()
    {
        $users = Auth()->user();
        $pasars = Pasar ::all()->where('id','7');
        $dataSurveyors = User ::with('dataSurveyor')->get();
        return view('backend.admin.import.formSerpong', compact('pasars','users','dataSurveyors'), ['title' => 'UPLOAD DATA']);
    }

    public function importDataPsCeger(Request $request)
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

        $import = new PendataanPsCegerImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormPsCeger')->with('success', 'Data berhasil diimpor.');
    }

    public function importDataPsCiputat(Request $request)
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

        $import = new PendataanPsCiputatImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormPsCiputat')->with('success', 'Data berhasil diimpor.');
    }

    public function importDataPsJombang(Request $request)
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

        $import = new PendataanPsJombangImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormPsJombang')->with('success', 'Data berhasil diimpor.');
    }

    public function importDataPsSerpong(Request $request)
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
        return redirect()->route('importFormPsSerpong')->with('success', 'Data berhasil diimpor.');
    }

    public function importDataPsJengkol(Request $request)
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

        $import = new PendataanPsJengkolImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormPsJengkol')->with('success', 'Data berhasil diimpor.');
    }

    public function importDataPsCimanggis(Request $request)
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

        $import = new PendataanPsCimanggisImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormPsCimanggis')->with('success', 'Data berhasil diimpor.');
    }

    public function importDataAll(Request $request)
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

        $import = new PendataanAllPasarImport($tanggalInput,$surveyor,$pasar);

        Excel::import($import, storage_path('app/public/' . $file));

        // Redirect atau melakukan tindakan lain setelah berhasil mengimpor
        return redirect()->route('importFormAll')->with('success', 'Data berhasil diimpor.');
    }

    public function getSurveyorCeger($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }

    public function getSurveyorCiputat($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }

    public function getSurveyorJombang($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }

    public function getSurveyorCimanggis($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }

    public function getSurveyorSerpong($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }

    public function getSurveyorJengkol($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }

    public function getSurveyorSemuaPasar($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
    }
}

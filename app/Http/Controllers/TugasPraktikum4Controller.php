<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Request;
use App\Exports\RakBukuExport;
use Maatwebsite\Excel\Facades\Excel;

class TugasPraktikum4Controller extends Controller
{
    public function tugas_praktikum_4(Request $request)
    {
        $query = RakBuku::join('buku', 'buku.id', '=', 'rak_buku.id_buku')
                                ->join('jenis_buku', 'jenis_buku.id', '=', 'rak_buku.id_jenis_buku');

        if($request->has("search")){
            $query->where('buku.judul', 'like', '%' . $request->search . '%');
        }

        $buku = $query->get();

        return view('tugaspratikum_0049', compact('buku'));
    }

    public function export_excel()
	{
		return Excel::download(new RakBukuExport, 'Data_1461900025.xlsx');
	}
}

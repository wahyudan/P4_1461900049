<?php

namespace App\Exports;

use App\Models\RakBuku;
use Maatwebsite\Excel\Concerns\FromCollection;

class RakBukuExport implements FromCollection
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $buku = RakBuku::join('buku', 'buku.id', '=', 'rak_buku.id_buku')
                ->join('jenis_buku', 'jenis_buku.id', '=', 'rak_buku.id_jenis_buku')->get();
        return $buku;
    }
}

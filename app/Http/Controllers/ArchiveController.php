<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $archives = Archive::simplePaginate(10)->withQueryString();

        // Kode untuk mengurutkan data dari yang terbaru
        $latest = request('latest');
        if ($latest == 'yes') {
            $archives = Archive::latest()->simplePaginate(10)->withQueryString();
        }
        $total = $archives->count();

        return view('dashboard.archive', [
            'archives' => $archives,
            'total' => $total,
            'latest' => $latest
        ]);
    }

    public function destroyAll()
    {
         // Ambil semua data archive
         $archives = Archive::all();

         // Hapus file dan entitas Archive satu per satu
         foreach ($archives as $archive) {
             Storage::delete('public/' . $archive->name);
             $archive->delete();
         }

        return redirect('/dashboard/archive')->with('success', 'All data archive has been deleted!');
    }

    public function destroy(Archive $archive)
    {
        // Menghapus data pada database
        Archive::destroy($archive->id);
        // Menghapus data pada storage
        Storage::delete('public/' . $archive->name);
        
        return redirect('/dashboard/archive')->with('success', 'Archive has been deleted!');
    }
}

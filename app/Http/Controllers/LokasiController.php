<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use DataTables;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Lokasi::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<a href="' . route('lokasi.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="' . route('lokasi.destroy', $row->id) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('lokasi.index');
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi created successfully.');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::find($id);
        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required',
        ]);

        $lokasi = Lokasi::find($id);
        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi updated successfully.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi deleted successfully.');
    }

    public function printLokasi()
    {
        $lokasi = Lokasi::all();
        // Logika untuk membuat PDF atau tampilan yang sesuai
        // Contoh: return view('lokasi.print', compact('lokasi'));
        return view('lokasi.print', ['lokasi' => $lokasi]);
    }
}

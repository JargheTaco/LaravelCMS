<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\VisimisiRequest;
use Illuminate\Support\Str;
use GuzzleHttp\Client;


class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $visimisi = VisiMisi::select(['id', 'title', 'desc'])->get();
    
            return DataTables::of($visimisi)
                ->addIndexColumn()
                ->addColumn('desc', function ($visimisi) {
                    return Str::limit(strip_tags($visimisi->desc), 100, '...');
                })
                ->addColumn('button', function ($visimisi) {
                    return '<div class="text-center">
                                <a href="' . url('visimisi/' . $visimisi->id) . '" class="btn btn-secondary">Detail</a>
                                <a href="' . url('visimisi/' . $visimisi->id . '/edit') . '" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteVisiMisi(this)" data-id="' . $visimisi->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['button'])
                ->make(true);
        }
    
        return view('back.visimisi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.visimisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisimisiRequest $request)
    {
        $data = $request->validated();
    
        // Buat slug dari title
        $data['slug'] = Str::slug($data['title']);
        
        // Simpan data ke database
        Visimisi::create($data);
    
        return redirect()->route('visimisi')->with('success', 'Visi Misi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visimisi = Visimisi::findOrFail($id);

        return view('back.visimisi.show', compact('visimisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visimisi = Visimisi::findOrFail($id);

        return view('back.visimisi.update', [
            'visimisi' => $visimisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisimisiRequest $request, string $id)
    {
        $visimisi = Visimisi::findOrFail($id);
        $data = $request->validated();
    
        // Perbarui slug hanya jika title berubah
        if ($data['title'] !== $visimisi->title) {
            $data['slug'] = Str::slug($data['title']);
        }
    
        // Update data ke database
        $visimisi->update($data);
    
        return redirect()->route('visimisi')->with('success', 'Visi Misi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visimisi = Visimisi::findOrFail($id);
        $visimisi->delete();
    }
}

<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\DokumentasiRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $dokumentasi = Dokumentasi::latest()->get();

            return DataTables::of($dokumentasi)
                ->addIndexColumn()
                ->addColumn('status', function ($dokumentasi) {
                    return $dokumentasi->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($dokumentasi) {
                    return '<div class="text-center">
                                <a href="dokumentasi/'.$dokumentasi->id.'" class="btn btn-secondary">Detail</a>
                                <a href="#" onclick="deleteDokumentasi(this)" data-id="'.$dokumentasi->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.dokumentasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.dokumentasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DokumentasiRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back/', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Dokumentasi::create($data);

        return redirect(url('dokumentasi'))->with('success', 'Dokumentasi Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        return view('back.dokumentasi.show', compact('dokumentasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        if ($dokumentasi->img && Storage::exists('public/back/' . $dokumentasi->img)) {
            Storage::delete('public/back/' . $dokumentasi->img);
        }

        $dokumentasi->delete();

        return response()->json([
            'message' => 'dokumentasi Deleted Successfully',
        ]);
    }
}

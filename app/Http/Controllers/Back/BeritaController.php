<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\BeritaRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $berita = Berita::with('Category')->latest()->get();

            return DataTables::of($berita)
                ->addIndexColumn()
                ->addColumn('category_id', function ($berita) {
                    return $berita->Category->name;
                })
                ->addColumn('status', function ($berita) {
                    return $berita->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($berita) {
                    return '<div class="text-center">
                                <a href="berita/'.$berita->id.'" class="btn btn-secondary">Detail</a>
                                <a href="berita/'.$berita->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteBerita(this)" data-id="'.$berita->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('back.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.berita.create', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back/', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Berita::create($data);

        return redirect(url('berita'))->with('success', 'berita Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('back.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('back.berita.update', [
            'berita' => $berita,
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);

            // Delete the old image if it exists
            if ($berita->img && Storage::exists('public/back/' . $berita->img)) {
                Storage::delete('public/back/' . $berita->img);
            }

            $data['img'] = $fileName;
        } else {
            $data['img'] = $berita->img;
        }

        $data['slug'] = Str::slug($data['title']);

        $berita->update($data);

        return redirect(url('berita'))->with('success', 'berita Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->img && Storage::exists('public/back/' . $berita->img)) {
            Storage::delete('public/back/' . $berita->img);
        }

        $berita->delete();

        return response()->json([
            'message' => 'berita Deleted Successfully',
        ]);
    }
}

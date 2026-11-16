<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
{
    public function index()
    {

        return view('buku.index', [
            'kategoris' => Kategori::orderBy('nama')->get(),
        ]);
    }

    public function show($id)
    {
        $item = Buku::with('kategori')->find($id);

        $buku = $item ? [
            'id'           => $item->id,
            'judul'        => $item->judul,
            'penulis'      => $item->penulis,
            'tahun_terbit' => $item->tahun_terbit,
            'kategori'     => $item->kategori->nama,
            'deskripsi'    => $item->deskripsi,
            'gambar'       => $item->gambar ? asset($item->gambar) : null,
        ] : null;

        return view('buku.show', compact('buku'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $animals = ["Kucing", "Ayam", "Ikan"];
    
    public function index() {
        echo "Menampilkan data animals : <br>";
        foreach ($this->animals as $animal) {
        echo " - $animal <br>";
        }
    }

    public function store(Request $request) {
        echo "Menambahkan hewan baru <br>";
        array_push($this->animals, $request->nama); 
        $this->index();
    }

    public function update($id, Request $request) {
        echo "Mengupdate data hewan dengan id $id : <br>";
        $this->animals[$id] = $request->nama;
        $this->index();
    }
    
    public function destroy($id) {
        echo "Menghapus data hewan dengan id $id <br> ";
        array_splice($this->animals, $id);      
        $this->index();
    }
}
<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;
use App\Models\CategoryProduct as CategoryModel;

class Category extends Component
{
    public $searchkategori, $nama_kategori, $kategori_id;
    public $updateMode = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $paginationName = 'CategoryPage';

    public function paginationView()
    {
        return 'components.admin.pagination_custom';
    }
    public function resetCategoryPage()
    {
        $this->gotoPage(1, 'CategoryPage');
    }
    public function resetInput()
    {
        $this->nama_kategori = '';
        $this->kategori_id = '';
    }
    public function render()
    {
        $currentCategoryPage = request()->input('CategoryPage', 1);
        return view('livewire.admin.category', [
            'kategoris' => CategoryModel::where('name', 'LIKE', '%' . $this->searchkategori . '%')
                ->orderBy('id', 'DESC')
                ->paginate(6, ['*'], 'CategoryPage'),
            'kategorisInput' => CategoryModel::all(),
            'currentCategoryPage' => $currentCategoryPage,
        ]);
    }

    public function storeKategori()
    {
        $this->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            ],
        );
        CategoryModel::create([
            'name' => $this->nama_kategori,
        ]);
        session()->flash('message', 'Kategori berhasil ditambahkan');
        $this->resetInput();
    }
   
    public function destroyKategori($id)
    {
        $id = Crypt::decrypt($id); 
        CategoryModel::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus');
    }
}
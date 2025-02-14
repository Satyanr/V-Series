<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class Product extends Component
{
    public $searchproduct, $image, $nama_product, $product_id, $description, $type, $pixel_pitch, $panel_dimension, $module_dimension, $module_resolution, $brightness, $refresh_rate, $color_temperatur, $viewing_angle, $power_consumption, $storage_temperature, $operation_temperature, $storage_humidity, $operation_humidity, $ip_rating;

    public $updateMode = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $paginationName = 'ProductPage';
    public function paginationView()
    {
        return 'components.admin.pagination_custom';
    }
    public function resetProductPage()
    {
        $this->gotoPage(1, 'ProductPage');
    }
    public function resetInput()
    {
        $this->nama_product = '';
        $this->product_id = '';
        $this->image = '';
        $this->description = '';
        $this->type = '';
        $this->pixel_pitch = '';
        $this->panel_dimension = '';
        $this->module_dimension = '';
        $this->module_resolution = '';
        $this->brightness = '';
        $this->refresh_rate = '';
        $this->color_temperatur = '';
        $this->viewing_angle = '';
        $this->power_consumption = '';
        $this->storage_temperature = '';
        $this->operation_temperature = '';
        $this->storage_humidity = '';
        $this->operation_humidity = '';
        $this->ip_rating = '';
    }
    public function render()
    {
        $currentProductPage = request()->input('ProductPage', 1);
        return view('livewire.admin.product', [
            'products' => ProductModel::where('name', 'LIKE', '%' . $this->searchproduct . '%')
                ->orderBy('id', 'DESC')
                ->paginate(6, ['*'], 'ProductPage'),
            'productInput' => ProductModel::all(),
            'currentProductPage' => $currentProductPage,
        ]);
    }

    public function storeProduct()
    {
        $this->validate(
            [
                'nama_product' => 'required',
                'type' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'nama_product.required' => 'Nama kategori tidak boleh kosong',
                'type.required' => 'Type tidak boleh kosong',
                'image.required' => 'Gambar tidak boleh kosong',
                'image.image' => 'File yang diupload harus gambar',
                'image.mimes' => 'Format gambar yang diupload harus jpeg, png, jpg, gif, svg',
                'image.max' => 'Ukuran gambar yang diupload maksimal 2MB',
            ],
        );
        $filename = time() . $this->image->getClientOriginalName();
        $destinationPath = 'public/tindakan_img';

        Storage::putFileAs($destinationPath, $this->image, $filename);
        ProductModel::create([
            'image' => 'storage/tindakan_img/' . $filename,
            'name' => $this->nama_product,
            'type' => $this->type,
            'description' => $this->description,
            'pixel_pitch' => $this->pixel_pitch,
            'panel_dimension' => $this->panel_dimension,
            'module_dimension' => $this->module_dimension,
            'module_resolution' => $this->module_resolution,
            'brightness' => $this->brightness,
            'refresh_rate' => $this->refresh_rate,
            'color_temperatur' => $this->color_temperatur,
            'viewing_angle' => $this->viewing_angle,
            'power_consumption' => $this->power_consumption,
            'storage_temperature' => $this->storage_temperature,
            'operation_temperature' => $this->operation_temperature,
            'storage_humidity' => $this->storage_humidity,
            'operation_humidity' => $this->operation_humidity,
            'ip_rating' => $this->ip_rating,
        ]);
        session()->flash('message', 'Product berhasil ditambahkan');
        $this->resetInput();
    }

    public function edit($id)
    {
        try {
            $idec = Crypt::decrypt($id);
        } catch (DecryptException $e) {
        }
        $this->updateMode = true;
        $product = ProductModel::where('id', $idec)->first();
        $this->product_id = Crypt::encrypt($product->id);
        $this->image = $product->image;
        $this->nama_product = $product->name;
        $this->type = $product->type;
        $this->description = $product->description;
        $this->pixel_pitch = $product->pixel_pitch;
        $this->panel_dimension = $product->panel_dimension;
        $this->module_dimension = $product->module_dimension;
        $this->module_resolution = $product->module_resolution;
        $this->brightness = $product->brightness;
        $this->refresh_rate = $product->refresh_rate;
        $this->color_temperatur = $product->color_temperatur;
        $this->viewing_angle = $product->viewing_angle;
        $this->power_consumption = $product->power_consumption;
        $this->storage_temperature = $product->storage_temperature;
        $this->operation_temperature = $product->operation_temperature;
        $this->storage_humidity = $product->storage_humidity;
        $this->operation_humidity = $product->operation_humidity;
        $this->ip_rating = $product->ip_rating;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $product = ProductModel::find(Crypt::decrypt($this->product_id));
        $product->update([
            'image' => $this->image,
            'name' => $this->nama_product,
            'type' => $this->type,
            'description' => $this->description,
            'pixel_pitch' => $this->pixel_pitch,
            'panel_dimension' => $this->panel_dimension,
            'module_dimension' => $this->module_dimension,
            'module_resolution' => $this->module_resolution,
            'brightness' => $this->brightness,
            'refresh_rate' => $this->refresh_rate,
            'color_temperatur' => $this->color_temperatur,
            'viewing_angle' => $this->viewing_angle,
            'power_consumption' => $this->power_consumption,
            'storage_temperature' => $this->storage_temperature,
            'operation_temperature' => $this->operation_temperature,
            'storage_humidity' => $this->storage_humidity,
            'operation_humidity' => $this->operation_humidity,
            'ip_rating' => $this->ip_rating,
        ]);

        $this->updateMode = false;
        session()->flash('message', 'Data Berhasil Di Edit');
        $this->resetInput();
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInput();
    }

    public function destroyProduct($id)
    {
        $id = Crypt::decrypt($id);
        ProductModel::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus');
    }
}

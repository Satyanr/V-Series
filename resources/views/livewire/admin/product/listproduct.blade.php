<div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari Produk..." wire:model="searchproduct">
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary" wire:click='listoff'>
                    <i class="fas fa-plus"></i> Tambah Produk
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Tipe</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ ($currentProductPage - 1) * 6 + $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->type }}</td>
                            <td>
                                @if (!empty($product->image))
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid"
                                        style="width: 100px;">
                                @else
                                    <span>Tidak ada gambar</span>
                                @endif
                            </td>

                            <td>
                                <div class="btn-group dropend">
                                    <button type="button" class="btn btn-outline-dark dropdown-toggle border-0"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                        <li>
                                            <button type="button" class="btn btn-outline-warning border-0"
                                                wire:click="edit('{{ Crypt::encrypt($product->id) }}')">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-outline-danger border-0"
                                                wire:click="delete('{{ Crypt::encrypt($product->id) }}')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </div>
</div>

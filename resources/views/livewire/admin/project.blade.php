<div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari proyek..." wire:model="searchproject">
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModal">
                    <i class="fas fa-plus"></i> Tambah Proyek
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Klien</th>
                        <th>gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $index => $project)
                        <tr>
                            <td>{{ ($currentProjectPage - 1) * 6 + $index + 1 }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->client }}</td>
                            <td>
                                @if ($project->projectImages->isNotEmpty())
                                    <img src="{{ asset($project->projectImages->first()->path) }}"
                                        alt="{{ $project->title }}" class="img-fluid" style="width: 100px;">
                                @else
                                    <span>Tidak ada gambar</span>
                                @endif
                            </td>

                            <td>
                                <button class="btn btn-warning btn-sm"
                                    wire:click="edit('{{ Crypt::encrypt($project->id) }}')" data-bs-toggle="modal"
                                    data-bs-target="#projectModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm"
                                    wire:click="delete('{{ Crypt::encrypt($project->id) }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $projects->links() }}
    </div>


    <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">{{ $updateMode ? 'Edit Proyek' : 'Tambah Proyek' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" wire:model="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" wire:model="description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Klien</label>
                <input type="text" class="form-control" wire:model="client">
                @error('client')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3" wire:ignore>
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control" wire:model="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="cancel">Batal</button>
                <button type="submit" class="btn btn-primary">{{ $updateMode ? 'Update' : 'Simpan' }}</button>
            </div>
        </form>
    </div>

</div>

<div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari proyek..." wire:model="searchproject">
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary" wire:click='listoff'>
                    <i class="fas fa-plus"></i> Tambah Proyek
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
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
                                <div class="btn-group dropend">
                                    <button type="button" class="btn btn-outline-dark dropdown-toggle border-0"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                        <li>
                                            <button type="button" class="btn btn-outline-warning border-0"
                                                wire:click="edit('{{ Crypt::encrypt($project->id) }}')">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-outline-danger border-0"
                                                wire:click="delete('{{ Crypt::encrypt($project->id) }}')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $projects->links() }}
    </div>
</div>

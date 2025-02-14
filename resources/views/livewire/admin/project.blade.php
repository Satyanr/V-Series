<div>
    <div wire:loading wire:target='liston'>
        <div id="loading-overlay" class="loading-overlay">
            <div class="la-ball-clip-rotate-pulse la-3x">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div wire:loading wire:target='listoff'>
        <div id="loading-overlay" class="loading-overlay">
            <div class="la-ball-clip-rotate-pulse la-3x">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    @if ($listmode)
        @include('livewire.admin.project.listproject')
    @else
        @include('livewire.admin.project.addproject')
    @endif
</div>

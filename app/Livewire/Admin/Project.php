<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Crypt;
use App\Models\Project as ProjectModel;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\ProjectImage as ProjectImageModel;
use Illuminate\Contracts\Encryption\DecryptException;

class Project extends Component
{
    public $searchproject, $image, $title, $project_id, $description, $client, $imageedit;
    use WithFileUploads;
    use LivewireAlert;
    public $updateMode = false,
        $listmode = true;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $paginationName = 'ProjectPage';
    public function paginationView()
    {
        return 'components.admin.pagination_custom';
    }
    public function resetProjectPage()
    {
        $this->gotoPage(1, 'ProjectPage');
    }
    public function resetInput()
    {
        $this->title = '';
        $this->project_id = '';
        $this->image = '';
        $this->description = '';
        $this->client = '';
    }

    public function render()
    {
        $currentProjectPage = request()->input('ProjectPage', 1);
        return view('livewire.admin.project', [
            'projects' => ProjectModel::where('title', 'LIKE', '%' . $this->searchproject . '%')
                ->orderBy('id', 'DESC')
                ->paginate(6, ['*'], 'ProjectPage'),
            'projectInput' => ProjectModel::all(),
            'currentProjectPage' => $currentProjectPage,
        ]);
    }

    public function liston()
    {
        $this->listmode = true;
    }
    public function listoff()
    {
        $this->listmode = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'client' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filename = time() . $this->image->getClientOriginalName();
        $destinationPath = 'public/project_img';

        Storage::putFileAs($destinationPath, $this->image, $filename);

        $project = ProjectModel::create([
            'title' => $this->title,
            'description' => $this->description,
            'client' => $this->client,
        ]);

        ProjectImageModel::create([
            'project_id' => $project->id,
            'path' => 'storage/project_img/' . $filename,
        ]);

        $this->resetInput();
        session()->flash('message', 'Project berhasil ditambahkan');
        $this->resetInput();
    }

    public function edit($id)
    {
        try {
            $idec = Crypt::decrypt($id);
        } catch (DecryptException $e) {
        }
        $project = ProjectModel::find($idec);
        $this->project_id = $project->id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->client = $project->client;
        $this->imageedit = $project->image;
        $this->updateMode = true;
        $this->listoff();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'client' => 'required',
        ]);

        if ($this->project_id) {
            $project = ProjectModel::find($this->project_id);
            $project->update([
                'title' => $this->title,
                'description' => $this->description,
                'client' => $this->client,
            ]);
            session()->flash('message', 'Project berhasil diupdate');
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        try {
            $idec = Crypt::decrypt($id);
        } catch (DecryptException $e) {
        }
        ProjectModel::find($idec)->delete();
        session()->flash('message', 'Project berhasil dihapus');
    }

    public function cancel()
    {
        $this->liston();
        $this->updateMode = false;
        $this->resetInput();
    }
    
}

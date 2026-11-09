<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InformasiDokumen;

class DokumenTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $perPage = 10;

    // Keep search and perPage in the URL so pagination/state can be shared/bookmarked
    protected $queryString = ['search' => ['except' => ''], 'perPage' => ['except' => 10]];

    public function mount()
    {
        $this->fill(request()->only('search','perPage'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // When the per-page value changes, reset to page 1 so users see results from the beginning
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = InformasiDokumen::query()
            ->whereRaw("COALESCE(kategori, 'umum') != ?", ['tertutup'])
            ->orderByDesc('created_at');

        if ($this->search) {
            $q = '%' . $this->search . '%';
            $query->where(function ($qry) use ($q) {
                $qry->where('judul_informasi', 'like', $q)
                    ->orWhere('deskripsi', 'like', $q);
            });
        }

        $dokumen = $query->paginate($this->perPage);

        return view('livewire.dokumen-table', [
            'dokumen' => $dokumen,
        ]);
    }
}

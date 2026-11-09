<style>
/* Scoped styling for the dokumen table to keep look consistent across light/dark modes */
.dokumen-root { color: #000; }
.dark .dokumen-root { color: #fff; }
.dokumen-root .count { color: #4b5563; }
.dark .dokumen-root .count { color: #9ca3af; }
.dokumen-root input, .dokumen-root select { height: 2.5rem; border-radius: .375rem; border: 1px solid #e5e7eb; padding: .5rem .75rem; background: #fff; color: #000; }
.dark .dokumen-root input, .dark .dokumen-root select { background: #0f1724; color: #fff; border-color: #374151; }
.dokumen-root table { color: inherit; }
.dokumen-root th, .dokumen-root td { vertical-align: middle; }
.dokumen-root .btn-download { background-color: #0ea5e9; color: #fff; }
.dark .dokumen-root .btn-download { background-color: #0369a1; }
.dokumen-root nav[role="navigation"] a,
.dokumen-root nav[role="navigation"] span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2.25rem;
    height: 2.25rem;
    padding: 0 .5rem;
    border-radius: .375rem;
    border: 1px solid transparent;
    color: #111827;
    background: #ffffff;
}
.dark .dokumen-root nav[role="navigation"] a,
.dark .dokumen-root nav[role="navigation"] span {
    color: #e5e7eb;
    background: #0b1220;
    border-color: #374151;
}
.dokumen-root nav[role="navigation"] a:hover { background:#f3f4f6 }
.dark .dokumen-root nav[role="navigation"] a:hover { background:#0f1724 }
/* Light-mode stronger border overrides so borders are visible (make them dark) */
.dokumen-root :where(.border, table, th, td, thead, tbody) {
    border-color: #111827 !important;
}
.dokumen-root input, .dokumen-root select {
    border-color: #111827 !important;
}
.dokumen-root nav[role="navigation"] a,
.dokumen-root nav[role="navigation"] span {
    border-color: #111827 !important;
    color: #111827 !important;
    background: #fff !important;
}
.dark .dokumen-root nav[role="navigation"] a,
.dark .dokumen-root nav[role="navigation"] span {
    color: #e5e7eb !important;
    background: #0b1220 !important;
    border-color: #374151 !important;
}
/* Force pure black borders in light mode for maximum contrast */
html:not(.dark) .dokumen-root :where(table, th, td, thead, tbody, .border, input, select, nav[role="navigation"] a, nav[role="navigation"] span) {
    border-color: #000 !important;
}
/* Light-mode input/select specific rules */
html:not(.dark) .dokumen-root input,
html:not(.dark) .dokumen-root select {
    background: #ffffff !important;
    color: #111827 !important;
    border-color: #000 !important;
}
html:not(.dark) .dokumen-root input::placeholder { color: #6b7280 !important; }
/* Dark mode counterparts */
.dark .dokumen-root input,
.dark .dokumen-root select {
    background: #0f1724 !important;
    color: #e5e7eb !important;
    border-color: #374151 !important;
}
.dark .dokumen-root input::placeholder { color: #9ca3af !important; }
</style>

<div class="dokumen-root">
    <div class="mb-4 relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-3 flex-1">
            <input wire:model.debounce.300ms="search" type="text" placeholder="Cari dokumen..." class="w-64 h-10 rounded-md border px-3 text-sm placeholder:text-current" />
        </div>
        <!-- Debug: show current search value (remove when done) -->
        <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">Debug search: <span class="font-medium">{{ $search }}</span></div>
        <div class="w-full flex justify-end sm:w-auto sm:justify-end">
            <span class="count text-sm">Menampilkan {{ $dokumen->count() }} dari {{ $dokumen->total() }}</span>
        </div>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow-lg dark:bg-[#111218] dark:shadow-none border border-gray-200 dark:border-gray-800">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] table-fixed text-sm text-left text-black dark:text-white border-collapse">
                <colgroup>
                    <col style="width:45%" />
                    <col style="width:45%" />
                    <col style="width:10%" />
                </colgroup>
                <thead class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="py-3 px-4 text-xs font-semibold text-black uppercase">Nama Dokumen</th>
                        <th class="py-3 px-4 text-xs font-semibold text-black uppercase">Deskripsi</th>
                        <th class="py-3 px-4 text-xs font-semibold text-black uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($dokumen as $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="py-4 px-4 align-top font-medium text-black break-words border-b border-gray-100 dark:border-gray-700">{{ $item->judul_informasi ?? $item->judul ?? 'Untitled' }}</td>
                            <td class="py-4 px-4 align-top text-black text-sm break-words max-h-36 overflow-hidden border-b border-gray-100 dark:border-gray-700">{{ Str::limit(strip_tags($item->deskripsi ?? '-'), 180) }}</td>
                            <td class="py-4 px-4 align-top text-black text-center border-b border-gray-100 dark:border-gray-700">
                                <a href="{{ route('dokumen.download', $item->id) }}" class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white shadow hover:bg-primary/90 dark:shadow-none">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-6 px-4 text-center text-black">Belum ada dokumen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<br>
<br>
    <div class="mt-4">
        {{ $dokumen->links() }}
    </div>
</div>

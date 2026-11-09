<!DOCTYPE html>
<html lang="en">

<head>
    <!--mulai partials  head -->
    @include('partials.head')
    <!--akhir partials head -->
    <title>Dokumen PINHA | Pusat Informasi Nurul Huda</title>
    <!-- Bootstrap CDN (only for this page styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PLACEHOLDER" crossorigin="anonymous">
</head>

@php use Illuminate\Support\Str; @endphp
<body class="bg-[#FCFCFC] dark:bg-black __className_f367f3">
    <script>!function () { try { var d = document.documentElement, c = d.classList; c.remove('light', 'dark'); var e = localStorage.getItem('theme'); if (e) { c.add(e || '') } else { c.add('dark'); } if (e === 'light' || e === 'dark' || !e) d.style.colorScheme = e || 'dark' } catch (t) { } }();</script>
    <style>
        /* Scoped theme overrides for dokumen page:
           - In dark mode: make most elements white for visibility
           - In light mode: make most elements black for contrast
           These rules are intentionally strong (use !important) and scoped under .dokumen-root
        */
        .dokumen-root { color: #000 !important; }
        .dokumen-root a, .dokumen-root th, .dokumen-root td, .dokumen-root p, .dokumen-root h2, .dokumen-root .btn { color: #000 !important; }
        .dark .dokumen-root { color: #fff !important; }
        .dark .dokumen-root a, .dark .dokumen-root th, .dark .dokumen-root td, .dark .dokumen-root p, .dark .dokumen-root h2, .dark .dokumen-root .btn { color: #fff !important; }

        /* Backgrounds: make container/table switch to dark background in dark mode */
        .dokumen-root { background-color: transparent !important; }
        .dokumen-root .table-responsive { background-color: transparent !important; }
        .dokumen-root .table { background-color: #ffffff !important; color: inherit !important; }
        .dokumen-root .table thead { background-color: #f8fafc !important; }
        .dokumen-root .table th, .dokumen-root .table td { background-color: transparent !important; border-color: #dee2e6 !important; }

        /* striping for light mode */
        .dokumen-root .table-striped tbody tr:nth-of-type(odd) { background-color: #fbfbfb !important; }

        /* Dark-mode overrides */
        .dark .dokumen-root .table { background-color: #071022 !important; }
        .dark .dokumen-root .table thead { background-color: #0b1220 !important; }
        .dark .dokumen-root .table th, .dark .dokumen-root .table td { background-color: transparent !important; border-color: #374151 !important; }
        /* softer stripe in dark mode */
        .dark .dokumen-root .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(255,255,255,0.02) !important; }

    /* Additional overrides to counter Bootstrap defaults that may set explicit white backgrounds */
    .dark .dokumen-root .table-responsive, .dark .dokumen-root .table { background-color: #071022 !important; }
    .dark .dokumen-root .table.table-bordered td, .dark .dokumen-root .table.table-bordered th { background-color: transparent !important; }
    .dark .dokumen-root .table tbody tr, .dark .dokumen-root .table tbody td { background-color: transparent !important; }
    .dark .dokumen-root .table-striped tbody tr:nth-of-type(even) { background-color: transparent !important; }

    /* Pagination and links */
    .dokumen-root nav[role="navigation"] ul.pagination { background: transparent !important; }
    .dokumen-root nav[role="navigation"] a, .dokumen-root nav[role="navigation"] span { color: #111827 !important; background: #ffffff !important; border-color: #111827 !important; }
    .dark .dokumen-root nav[role="navigation"] a, .dark .dokumen-root nav[role="navigation"] span { color: #e5e7eb !important; background: transparent !important; border-color: #374151 !important; }

    /* Buttons */
    .dark .dokumen-root .btn, .dark .dokumen-root .btn-primary { color: #ffffff !important; }

    /* Gridlines / borders: make them visible and consistent in both themes */
    .dokumen-root .table, .dokumen-root .table th, .dokumen-root .table td { border: 1px solid #111827 !important; }
    .dokumen-root .table thead th { border-bottom-width: 2px !important; }
    .dark .dokumen-root .table, .dark .dokumen-root .table th, .dark .dokumen-root .table td { border: 1px solid #374151 !important; }
    .dark .dokumen-root .table thead th { border-bottom-width: 2px !important; border-color: #4b5563 !important; }

    /* Increase padding so text doesn't touch borders */
    .dokumen-root .table th, .dokumen-root .table td { padding: .75rem 1rem !important; }
    .dokumen-root .table thead th { padding-top: .875rem !important; padding-bottom: .875rem !important; }
    </style>
    <!--mulai partials  header -->
    @include('partials.header')
    <!--akhir partials header -->
    <section class="relative z-10 overflow-hidden pt-28 lg:pt-[150px]">
        <div class="container">
            <h2 class="mb-6 text-xl font-bold">Informasi Kumpulan Dokumen</h2>

            {{-- Server-rendered table (Bootstrap) - Livewire removed per request --}}
            <div class="dokumen-root">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($informasi as $item)
                            <tr>
                                <td class="align-middle">{{ $item->judul_informasi ?? $item->judul ?? 'Untitled' }}</td>
                                <td class="align-middle">{!! Str::limit(strip_tags($item->deskripsi ?? '-'), 100) !!}</td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('dokumen.download', $item->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada dokumen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                {{ $informasi->links() ?? '' }}
            </div>
            </div>
        </div>
    </section>
    <br>
    
    <!--mulai partials  footer -->
    @include('partials.footer')
    <!--akhir partials footer -->

    <!--mulai partials  script -->
    @include('partials.script')
    <!--akhir partials script -->
    <script>
        // Ensure ellipsis only if text is actually truncated (line-clamp fallback helper)
        document.addEventListener('DOMContentLoaded', function () {
            function isOverflowing(el) {
                return el.scrollHeight > el.clientHeight || el.scrollWidth > el.clientWidth;
            }

            document.querySelectorAll('.js-ensure-ellipsis').forEach(function (el) {
                // If browser supports -webkit-line-clamp, it will visually truncate.
                // We check overflow and if true, append a visible ellipsis at the end.
                if (isOverflowing(el)) {
                    var text = el.textContent.trim();
                    // binary search to find maximum characters that fit
                    var low = 0, high = text.length, best = '';
                    while (low <= high) {
                        var mid = Math.floor((low + high) / 2);
                        el.textContent = text.slice(0, mid) + '...';
                        if (isOverflowing(el)) {
                            high = mid - 1;
                        } else {
                            best = el.textContent;
                            low = mid + 1;
                        }
                    }
                    if (best) el.textContent = best;
                }
            });
        });
    </script>
</body>

</html>
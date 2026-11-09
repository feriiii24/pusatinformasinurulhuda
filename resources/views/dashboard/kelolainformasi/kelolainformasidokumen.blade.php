<!DOCTYPE html>
<html lang="en">

<head>
  @include('dashboard.partials.head')
</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  @include('dashboard.partials.sidebar')
  <!-- ======== sidebar-nav end ============ -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    @include('dashboard.partials.header')
    <!-- ========== header end ========== -->
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                  <h2 class="mr-40">Informasi Dokumen</h2>
                  <a href="#tambahInformasidokumen" data-bs-toggle="modal" class="main-btn primary-btn btn-hover btn-sm">
                    <i class="lni lni-plus mr-5"></i> Tambah Informasi Dokumen
                  </a>
                </div>
                <!-- Modal Tambah Dokumen -->
                <div class="modal fade" id="tambahInformasidokumen" tabindex="-1" aria-labelledby="tambahInformasidokumenLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Dokumen Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('dashboard.informasidokumen.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-12">
                              <div class="card-style mb-30">
                                <h6 class="mb-25">Informasi Dokumen</h6>
                                <div class="input-style-1">
                                  <label>Judul Informasi</label>
                                  <input type="text" name="judul_informasi" placeholder="Masukkan judul informasi" required />
                                </div>
                                <div class="input-style-1">
                                  <label>Isi Informasi</label>
                                  <textarea name="deskripsi" rows="4" placeholder="Tulis isi informasi..." required></textarea>
                                </div>
                              </div>

                              <div class="card-style mb-30">
                                <h6 class="mb-25">Kategori</h6>
                                <div class="select-style-1">
                                  <label>Pilih Kategori</label>
                                  <div class="select-position">
                                    <select name="kategori" required>
                                      <option value="">-- Pilih kategori --</option>
                                      <option value="tertutup">Tertutup</option>
                                      <option value="umum">Terbuka</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="card-style mb-30">
                                <h6 class="mb-25">Tanggal & Waktu</h6>
                                <div class="input-style-1">
                                  <label>Tanggal</label>
                                  <input type="date" name="tgl" value="{{ date('Y-m-d') }}" required />
                                </div>
                                <div class="input-style-1">
                                  <label>Jam</label>
                                  <input type="time" name="waktu" value="{{ date('H:i') }}" required />
                                </div>
                              </div>

                              <div class="card-style mb-30">
                                <h6 class="mb-25">Unit</h6>
                                <div class="input-style-1">
                                  <label>Unit</label>
                                  <input type="text" name="unit" value="{{ optional(auth()->user()->unit)->name ?? '' }}" readonly />
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card-style mb-30">
                            <h6 class="mb-25">File (PDF)</h6>
                            <div class="input-style-1">
                              <label>Unggah File</label>
                              <input type="file" name="file" accept="application/pdf" required />
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="main-btn danger-btn btn-hover btn-sm" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Informasi</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dokumen
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-12">

            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== tables-wrapper start ========== -->
        <div class="card-style mb-30">
          <div class="title d-flex flex-wrap align-items-center justify-content-between">
            <div class="left">
              <h6 class="text-medium mb-30">Semua Tindakan</h6>
            </div>
            <div class="right">
              <div class="select-style-1">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">hari ini</option>
                    <option value="">Minggu Ini</option>
                    <option value="">Bulan Ini</option>
                    <option value="">Tahun Ini</option>
                    <option value="">Tampilkan 10 Data</option>
                    <option value="">Tampilkan 50 Data</option>
                    <option value="">Tampilkan 100 Data</option>
                    <option value="">Tampilkan Semua Data</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="table-responsive">
            <table class="table top-selling-table">
              <thead>
                <tr>
                  <th>
                    <h6 class="text-sm text-medium">Tindakan</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Kategori <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Pengguna <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th>
                    <h6 class="text-sm text-medium text-end">
                      Aksi <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @if(isset($rows) && count($rows) > 0)
                  @foreach($rows as $info)
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            @if(!empty($info->foto_utama))
                              <img src="{{ asset('storage/' . $info->foto_utama) }}" alt="" />
                            @else
                              <img src="{{ asset('build/assets/images/products/product-mini-1.jpg') }}" alt="" />
                            @endif
                          </div>
                          <p class="text-sm">{{ Str::limit($info->judul_informasi ?? $info->judul, 60) }}</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">{{ ucfirst($info->kategori ?? 'akademik') }}</p>
                      </td>
                      <td>
                        <p class="text-sm">{{ optional($info->user)->name ?? ($info->penulis ?? '—') }}</p>
                      </td>
                      <td>
                        <div class="action justify-content-end">
                          <!-- Edit button (matches Kelola Role small icon button) -->
                          <!-- trigger modal -->
                          <button type="button" class="btn btn-sm btn-light me-2" data-bs-toggle="modal"
                            data-bs-target="#editAkademikModal{{ $info->id }}" title="Edit">
                            <i class="lni lni-pencil"></i>
                          </button>

                          <!-- Delete button (small icon button inside form) -->
                          <form action="{{ route('dashboard.kelolainformasi.dokumen.destroy', $info->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus informasi ini?');"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light" title="Hapus"
                              style="color:#e74c3c;border-color:transparent;background:transparent;">
                              <i class="lni lni-trash-can"></i>
                            </button>
                          </form>
                        </div>

                        <!-- Edit Akademik Modal -->
                        <div class="modal fade" id="editAkademikModal{{ $info->id }}" tabindex="-1"
                          aria-labelledby="editAkademikModalLabel{{ $info->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editAkademikModalLabel{{ $info->id }}">Edit Informasi -
                                  {{ Str::limit($info->judul_informasi ?? $info->judul, 40) }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('dashboard.kelolainformasi.dokumen.update', $info->id) }}"
                                  method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-style-1">
                                    <label>Judul</label>
                                    <input type="text" name="judul"
                                      value="{{ old('judul', $info->judul_informasi ?? $info->judul) }}" required />
                                  </div>
                                  <div class="input-style-1">
                                    <label>Isi Informasi</label>
                                    <textarea name="isi"
                                      rows="6">{{ old('isi', $info->deskripsi ?? $info->isi ?? '') }}</textarea>
                                  </div>
                                  <div class="input-style-1">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl"
                                      value="{{ optional($info->tgl)->format('Y-m-d') ?? '' }}" />
                                  </div>
                                  <div class="modal-footer mt-20">
                                    <button type="button" class="main-btn danger-btn btn-hover btn-sm"
                                      data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- administrasi modal removed (not needed for akademik view) --}}
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5" class="text-center text-sm">Belum ada data Informasi Akademik.</td>
                  </tr>
                @endif
              </tbody>
            </table>
            <!-- End Table -->
          </div>
        </div>
        <!-- ========== tables-wrapper end ========== -->
      </div>
      <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    @include('dashboard.partials.footer')
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========== script start =========== -->
  @include('dashboard.partials.script')
  <!-- ========== script end =========== -->
</body>

</html>
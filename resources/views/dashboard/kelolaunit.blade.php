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
                <h2 class="mr-40">Kelola Unit</h2>
                <a href="#tambahInformasidokumen" data-bs-toggle="modal" class="main-btn primary-btn btn-hover btn-sm">
                  <i class="lni lni-plus mr-5"></i> Tambah Unit
                </a>
              </div>
              <!-- Modal Tambah Informasi -->
              <div class="modal fade" id="tambahInformasidokumen" tabindex="-1"
                aria-labelledby="tambahInformasidokumenLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl"> {{-- ubah ke modal-xl biar modal lebih lebar --}}
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Unit Baru</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('dashboard.units.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-12">
                            <div class="card-style mb-30">
                              <h6 class="mb-25">Tambah Unit</h6>

                              <div class="input-style-1">
                                <label>Nama Unit</label>
                                <input type="text" name="name" placeholder="Masukkan nama unit" required />
                              </div>

                              <div class="input-style-1">
                                <label>Foto Unit</label>
                                <input type="file" name="photo" accept="image/*" />
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="main-btn danger-btn btn-hover btn-sm"
                            data-bs-dismiss="modal">Batal</button>
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
                      <a href="#0">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Kelola Unit
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
              <form id="bulk-delete-form" action="{{ route('dashboard.units.bulk-delete') }}" method="POST">
                @csrf
                <input type="hidden" name="ids" id="bulk-ids" />
                <button type="submit" class="btn btn-danger btn-hover btn-sm ">Hapus Terpilih</button>
              </form>
            </div>
            <div class="right">
              <form method="GET" class="d-flex gap-2">
                <div class="select-style-1">
                  <div class="select-position select-sm">
                    <select name="period" class="light-bg">
                      <option value="all" {{ (isset($period) && $period == 'all') ? 'selected' : '' }}>Semua</option>
                      <option value="today" {{ (isset($period) && $period == 'today') ? 'selected' : '' }}>Hari Ini</option>
                      <option value="week" {{ (isset($period) && $period == 'week') ? 'selected' : '' }}>Minggu Ini</option>
                      <option value="month" {{ (isset($period) && $period == 'month') ? 'selected' : '' }}>Bulan Ini</option>
                      <option value="year" {{ (isset($period) && $period == 'year') ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                  </div>
                </div>

                <div class="select-style-1">
                  <div class="select-position select-sm">
                    <select name="per_page" class="light-bg">
                      <option value="10" {{ (isset($perPage) && $perPage == 10) ? 'selected' : '' }}>Tampilkan 10 Data</option>
                      <option value="50" {{ (isset($perPage) && $perPage == 50) ? 'selected' : '' }}>Tampilkan 50 Data</option>
                      <option value="100" {{ (isset($perPage) && $perPage == 100) ? 'selected' : '' }}>Tampilkan 100 Data</option>
                      <option value="0" {{ (isset($perPage) && $perPage == 0) ? 'selected' : '' }}>Tampilkan Semua Data</option>
                    </select>
                  </div>
                </div>

                <div>
                  <button class="btn btn-primary btn-hover btn-sm" type="submit">Filter</button>
                </div>
              </form>
              
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="table-responsive">
            <table class="table top-selling-table">
              <thead>
                <tr>
                    <th>
                      <input type="checkbox" id="select-all" />
                    </th>
                  <th>
                    <h6 class="text-sm text-medium">No</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Nama <i class="lni lni-arrows-vertical"></i>
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
                @foreach($units as $index => $unit)
                  <tr>
                    <td>
                      <input type="checkbox" class="row-checkbox" value="{{ $unit->id }}" />
                    </td>
                    <td>
                      <p class="text-sm">{{ ($units->currentPage() - 1) * $units->perPage() + $index + 1 }}</p>
                    </td>
                    <td>
                      <div class="product">
                        <div class="image">
                          @if($unit->photo ?? false)
                            <img src="{{ asset('storage/' . $unit->photo) }}" alt="{{ $unit->name }}" />
                          @else
                            <img src="{{ asset('build/assets/images/products/product-mini-4.jpg') }}" alt="default" />
                          @endif
                        </div>
                        <p class="text-sm">{{ $unit->name }}</p>
                      </div>
                    </td>
                    
                    <td>
                      <div class="action justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#editUnitModal{{ $unit->id }}" title="Edit Unit">
                          <i class="lni lni-pencil"></i>
                        </button>
                      </div>

                      <!-- Edit Unit Modal -->
                      <div class="modal fade" id="editUnitModal{{ $unit->id }}" tabindex="-1" aria-labelledby="editUnitModalLabel{{ $unit->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editUnitModalLabel{{ $unit->id }}">Edit Unit - {{ $unit->name }}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('dashboard.units.update', $unit->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="input-style-1">
                                  <label>Nama Unit</label>
                                  <input type="text" name="name" value="{{ old('name', $unit->name) }}" required />
                                </div>
                                <div class="input-style-1">
                                  <label>Foto Unit (opsional)</label>
                                  <input type="file" name="photo" accept="image/*" />
                                  @if($unit->photo)
                                    <div style="margin-top:8px;"><img src="{{ asset('storage/'.$unit->photo) }}" style="width:100px;height:100px;object-fit:cover;border-radius:6px;" /></div>
                                  @endif
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
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="mt-3">
              {{ $units->links() }}
            </div>
            <!-- Inline bulk script removed; centralized script in partial handles interactions -->
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
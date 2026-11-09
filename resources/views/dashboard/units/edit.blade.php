<!DOCTYPE html>
<html lang="en">

<head>
  @include('dashboard.partials.head')
</head>

<body>
  @include('dashboard.partials.sidebar')

  <main class="main-wrapper">
    @include('dashboard.partials.header')

    <section class="section">
      <div class="container-fluid">
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h2>Edit Unit</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="card-style mb-30">
          <div class="card-body">
            <form action="{{ route('dashboard.units.update', $unit->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="input-style-1">
                <label>Nama Unit</label>
                <input type="text" name="name" value="{{ old('name', $unit->name) }}" required />
              </div>

              <div class="mt-3">
                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
                <a href="{{ route('dashboard.units.index') }}" class="main-btn danger-btn btn-hover btn-sm">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    @include('dashboard.partials.footer')
  </main>

  @include('dashboard.partials.script')
</body>

</html>

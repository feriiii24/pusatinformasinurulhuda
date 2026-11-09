<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.partials.head')
</head>
<body>
@include('dashboard.partials.header')
<main class="main-wrapper">
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <h2>Edit Role</h2>
            </div>
            <div class="card-style mb-30">
                <form action="{{ route('dashboard.roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-style-1">
                        <label>Nama Role</label>
                        <input type="text" name="name" value="{{ old('name', $role->name) }}" required />
                    </div>
                    <div class="input-style-1">
                        <label>Foto Role (opsional)</label>
                        <input type="file" name="photo" accept="image/*" />
                        @if($role->photo)
                            <div style="margin-top:8px;"><img src="{{ asset('storage/'.$role->photo) }}" style="width:100px;height:100px;object-fit:cover;border-radius:6px;" /></div>
                        @endif
                    </div>
                    <div style="margin-top:12px;">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan Perubahan</button>
                        <a href="{{ route('dashboard.kelolarole') }}" class="main-btn danger-btn btn-hover btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@include('dashboard.partials.footer')
@include('dashboard.partials.script')
</body>
</html>
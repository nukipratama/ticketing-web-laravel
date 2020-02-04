@extends('base/base')
@section('content')
<div class="container">
  <h1 class="row">Informasi Pemesanan</h1>
  <p class="row">Jenis : {{$ticket->jenis}}</p>
  <p class="row">Kategori : {{$ticket->kategori}}</p>
  <p class="row">Jumlah : {{$jumlah}}</p>
  <p class="row">Total Harga : {{$jumlah*$ticket->harga}}</p>
</div>
<div class="container">
  <form action="/ticket/confirm" method="POST">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="emailPemesan">Alamat Email Pemesan</label>
        <input type="email" name="emailPemesan" class="form-control" id="emailPemesan" required>
      </div>
    </div>

    <?php for($i = 0;$i<$jumlah;$i++):?>
    <section id="peserta{{$i+1}}">
      <h3 class="text-center">Peserta ke-{{$i+1}}</h3>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="namePeserta">Nama</label>
          <input type="text" class="form-control" name="namePeserta[]" required>
        </div>
        <div class="form-group col-md-6">
          <label for="emailPeserta">Email</label>
          <input type="email" class="form-control" name="emailPeserta[]" required>
        </div>
      </div>
      <div class="form-group">
        <label for="addressPeserta">Alamat</label>
        <input type="text" class="form-control" name="addressPeserta[]" required>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="telPeserta">No Telp</label>
          <input type="tel" class="form-control" name="telPeserta[]" required>
        </div>
        <div class="form-group col-md-6">
          <label for="emergencyPeserta">No Telp Darurat</label>
          <input type="tel" class="form-control" name="emergencyPeserta[]" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="genderPeserta">Jenis Kelamin</label>
          <select name="genderPeserta[]" class="form-control" required>
            <option selected>Pilih..</option>
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="birthdatePeserta">Tanggal Lahir</label>
          <input class="form-control" type="date" name="birthdatePeserta[]" required>
        </div>
        <div class="form-group col-md-4">
          <label for="idPeserta">No Identitas</label>
          <input type="text" class="form-control" name="idPeserta[]" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="communityPeserta">Komunitas Lari</label>
          <input class="form-control" type="text" name="communityPeserta[]">
        </div>
        <div class="form-group col-md-6">
          <label for="sizePeserta">Ukuran Baju</label>
          <select name="sizePeserta[]" class="form-control" required>
            <option selected>Pilih..</option>
            <option value="S">Small</option>
            <option value="M">Medium</option>
            <option value="L">Large</option>
            <option value="XL">Extra Large</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="imgPeserta">Foto Identitas Peserta</label>
          <input class="form-control" accept="image/*" type="file" name="imgPeserta[]" required>
        </div>
        <div class="form-group col-md-6">
          <label for="medicalPeserta">Riwayat Penyakit</label>
          <input class="form-control" type="text" name="medicalPeserta[]" required>
        </div>
      </div>
      @if ($i!= $jumlah-1)
      <a href="#peserta{{$i+2}}">lanjut ke Peserta ke-{{$i+2}}</a>
      @endif
    </section>
    <?php endfor;?>

    <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
  </form>
</div>
@endsection
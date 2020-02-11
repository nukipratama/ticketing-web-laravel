@extends('base/base')
@section('content')
<div class="container">
   <h1 class="row">Informasi Pemesanan</h1>
   <p class="row">Jenis : {{$book->jenis}}</p>
   <p class="row">Kategori : {{$book->kategori}}</p>
   <p class="row">Jumlah : {{$book->jumlah}}</p>
   <p class="row">Total Harga : {{$book->jumlah*$book->harga}}</p>
</div>
<div class="container">
   <form action="/ticket/check" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="emailPemesan">Alamat Email Pemesan</label>
            <input type="email" name="emailPemesan" id="emailPemesan"
               class="form-control  @if($errors->any()) {{ $errors->has('emailPemesan') ? 'is-invalid' :  'is-valid'}} @endif"
               value="{{old('emailPemesan')}}">
            @error('emailPemesan')
            <div class="invalid-feedback">
               {{ $errors->first('emailPemesan') }}
            </div>
            @enderror
         </div>
      </div>

      @for ($i = 0; $i < $book->jumlah; $i++)
         <section id="peserta{{$i+1}}">
            <h3 class="text-center">Peserta ke-{{$i+1}}</h3>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="namePeserta">Nama</label>
                  <input type="text" name="namePeserta[]" value="{{old('namePeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('namePeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('namePeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('namePeserta.'.$i) }}
                  </div>
                  @enderror
               </div>

               <div class="form-group col-md-6">
                  <label for="emailPeserta">Email</label>
                  <input type="email" name="emailPeserta[]" value="{{old('emailPeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('emailPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('emailPeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('emailPeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
            </div>
            <div class="form-group">
               <label for="addressPeserta">Alamat</label>
               <input type="text" name="addressPeserta[]" value="{{old('addressPeserta.'.$i)}}"
                  class="form-control  @if($errors->any()) {{ $errors->has('addressPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
               @error('addressPeserta.'.$i)
               <div class="invalid-feedback">
                  {{ $errors->first('addressPeserta.'.$i) }}
               </div>
               @enderror
            </div>

            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="telPeserta">No Telp</label>
                  <input type="tel" name="telPeserta[]" value="{{old('telPeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('telPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('telPeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('telPeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="emergencyPeserta">No Telp Darurat</label>
                  <input type="tel" name="emergencyPeserta[]" value="{{old('emergencyPeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('emergencyPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('emergencyPeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('emergencyPeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
            </div>

            <div class="form-row">
               <div class="form-group col-md-4">
                  <label for="genderPeserta">Jenis Kelamin</label>
                  <select name="genderPeserta[]" value="{{old('genderPeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('genderPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                     <option value="">Pilih..</option>
                     <option value="male">Laki-laki</option>
                     <option value="female">Perempuan</option>
                  </select>
                  @error('genderPeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('genderPeserta.'.$i) }}
                  </div>
                  @enderror

               </div>
               <div class="form-group col-md-4">
                  <label for="birthdatePeserta">Tanggal Lahir</label>
                  <input type="date" name="birthdatePeserta[]" value="{{old('birthdatePeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('birthdatePeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('birthdatePeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('birthdatePeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
               <div class="form-group col-md-4">
                  <label for="idPeserta">No Identitas</label>
                  <input type="text" name="idPeserta[]" value="{{old('idPeserta.'.$i)}}" class="form-control
                     @if($errors->any()) {{ $errors->has('idPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('idPeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('idPeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
            </div>

            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="communityPeserta">Komunitas Lari</label>
                  <input type="text" name="communityPeserta[]" value="{{old('communityPeserta.'.$i)}}"
                     class="form-control  @if($errors->any()) {{ $errors->has('communityPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                  @error('communityPeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('communityPeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="sizePeserta">Ukuran Baju</label>
                  <select name="sizePeserta[]" value="{{old('sizePeserta.'.$i)}}"
                     class="form-control @if($errors->any()) {{$errors->has('sizePeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif">
                     <option value="">Pilih..</option>
                     <option value="S">Small</option>
                     <option value="M">Medium</option>
                     <option value="L">Large</option>
                     <option value="XL">Extra Large</option>
                  </select>
                  @error('sizePeserta.'.$i)
                  <div class="invalid-feedback">
                     {{ $errors->first('sizePeserta.'.$i) }}
                  </div>
                  @enderror
               </div>
            </div>


            <div class="form-row">
               <div class="form-group col-md-6 ">
                  <label for="imgPeserta">Foto Identitas Peserta</label>
                  <input type="file" name="imgPeserta[]" class="form-control  @if($errors->any())
                  {{ $errors->has('imgPeserta') || $errors->has('imgPeserta.'.$i)  ? 'is-invalid'  : ''}} @endif">
                  @if($errors->has('imgPeserta') || $errors->has('imgPeserta.'.$i))
                  <div class="invalid-feedback">
                     {{ $errors->first('imgPeserta') }}
                     {{$errors->first('imgPeserta.'.$i)}}
                  </div>
                  @endif
               </div>
               <div class="form-group col-md-6">
                  <label for="medicalPeserta">Riwayat Penyakit</label>
                  <input type="text" name="medicalPeserta[]"
                     class="form-control  @if($errors->any()) {{ $errors->has('medicalPeserta.'.$i) ? 'is-invalid' :  'is-valid'}} @endif"
                     value="{{old('medicalPeserta.'.$i)}}">
               </div>
            </div>
            @if ($i!= $book->jumlah-1)
            <a href="#peserta{{$i+2}}">lanjut ke Peserta ke-{{$i+2}}</a>
            @endif
         </section>
         @endfor

         <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
   </form>
</div>
@endsection
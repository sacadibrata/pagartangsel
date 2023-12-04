<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <title>PAGAR TANGSEL | {{ $title }}</title>
</head>
  <body>
      <div class="container mt-4">

        <h2>{{ $title }}</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <div class="table-responsive">
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Komoditas</th>
                    <th>Satuan</th>
                    <th>Harga Kemarin</th>
                    <th>Harga Hari ini</th>
                    <th>Perubahan (Rp)</th>
                    <th>Perubahan (%)</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @php
                $currentKategori = null;
                @endphp
                <?php $i = 1; ?>
                @foreach ($komoditas as $komoditi)
                    @if ($komoditi->kategori->nama_kategori != $currentKategori)
                        <tr>
                            <td colspan="8"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                        </tr>
                        @php
                            $currentKategori = $komoditi->kategori->nama_kategori;
                        @endphp
                    @endif
                    <tr>
                        <td>{{$i}}.</td>
                        <td>{{ $komoditi->nama_komoditas }}</td>
                        <td>{{ $komoditi->satuan->nama_satuan }}</td>
                        <td>
                            @php
                            $hargaKemarin = null;
                            @endphp
                            @foreach ($komoditi->pendataanjengkol as $hargaBarang)
                                @if ($hargaBarang->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                    @php
                                        $hargaKemarin = $hargaBarang->average_harga;
                                    @endphp
                                    {{ number_format($hargaKemarin, 0, ',', '.') }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            {{-- You can fetch the "Harga Hari Ini" here --}}
                            @php
                            $hargaHariIni = null;
                            @endphp
                            @foreach ($komoditi->pendataanjengkol as $hargaBarang)
                                @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                    @php
                                        $hargaHariIni = $hargaBarang->average_harga;
                                    @endphp
                                    {{ number_format($hargaHariIni, 0, ',', '.') }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            {{-- Calculate and display the perubahan (change) --}}
                            @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                @php
                                    $perubahan = $hargaHariIni - $hargaKemarin;
                                @endphp
                                {{ number_format($perubahan, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            {{-- Calculate and display the perubahan in percentage --}}
                            @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                @php
                                    $perubahanPercentage = ($perubahan / $hargaKemarin) * 100;
                                @endphp
                                {{ number_format($perubahanPercentage, 2, ',', '.') }}%
                            </td>
                                <td>
                                @if ($perubahan > 0)
                                <span class="btn btn-pill btn-danger"><i class="fa-solid fa-arrow-up"></i></span>
                                @elseif ($perubahan < 0)
                                <span class="btn btn-pill btn-success"><i class="fa-solid fa-arrow-down"></i></span>
                                @else
                                <span class="btn btn-pill btn-secondary"><i class="fa-solid fa-equals"></i></span>
                                @endif
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

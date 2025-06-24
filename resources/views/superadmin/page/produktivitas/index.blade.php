@extends('superadmin.layout.unit_main')
@section('title')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                </div>
            </div>
            <div class="col-lg-12 align-items-strech">
                <div class="row">

                    <div class="col-lg-12 p-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-sm-flex d-block align-items-center justify-content-between">
                                    <div class=" m-0">
                                        <h5 class="card-title text-start fw-semibold">Tabel Produktivitas SFV <ds
                                                id="yeart">
                                            </ds>
                                        </h5>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-md" data-bs-toggle="modal"
                                            data-bs-target="#modalId">
                                            <i class="ti ti-plus"> Tambah</i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalId" tabindex="-1" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-xl " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Modal title
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">Body</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                @foreach ($thn as $t)
                                                    <th>{{ $t->tahun }}</th>
                                                @endforeach
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($kategori as $kat)
                                                <tr>
                                                    <td>{{ $kat->kategori }}</td>
                                                    @foreach ($data as $i)
                                                        @foreach ($thn as $t)
                                                            {{-- <td>{{ $t->tahun }}</td> --}}
                                                            @if ($i->kategori == $kat->kategori)
                                                                @if ($i->tahun == $t->tahun)
                                                                    <td>{{ $i->tahun }}</td>
                                                                @else
                                                                    <td>0</td>
                                                                @endif
                                                            @endif
                                                            {{-- sdsd --}}
                                                        @endforeach
                                                    @endforeach
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
@endsection
@section('script')
    <script>
        new DataTable('#example');
    </script>
@endsection

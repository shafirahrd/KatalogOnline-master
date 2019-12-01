<tr>
    <td>${index+1}</td>
    <td>${item.judul}</td>
    <td>${item.koleksi.jenis_koleksi==null ? '-':item.koleksi.jenis_koleksi}</td>
    <td>${item.penulis==null ? '-':item.penulis}</td>
    <td>${item.tahun_terbit==null ? '-':item.tahun_terbit}</td>
    <td>${item.lokasis.departemen}</td>
    <td>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Detail-${item.id_katalog}" data-plaement="top" title="Lihat Detail Koleksi"><i class="fa fa-folder-open"></i></button>
        <div class="modal fade" id="Detail-${item.id_katalog}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <center><h2 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">${item.judul}</h2></center>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="tab-content br-n pn">
                                    <div class="tab-pane active">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-10">
                                                <table class="table table-borderless" style="table-layout: fixed">
                                                    <tbody class="detail-text text-left">
                                                        <tr>
                                                            <td style="width: 1%"><span class="text-muted" style="font-weight: 500;">Judul Koleksi</span></td>
                                                            <td style="width: 0%"><span class="text-muted" style="font-weight: 500;">: </span></td>
                                                            <td style="width: 1%"><span style="margin-left: 5%;"> ${item.judul}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Jenis Koleksi</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">
                                                                ${item.koleksi.jenis_koleksi==null ? '-':item.koleksi.jenis_koleksi}
                                                            </span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Penulis</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">${item.penulis==null ? '-':item.penulis}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Penerbit</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">${item.penerbit==null ? '-':item.penerbit}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Kota Penerbit</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">${item.kota_penerbit==null ? '-':item.kota_penerbit}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Tahun Terbit</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">${item.tahun_terbit==null ? '-':item.tahun_terbit}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Bahasa</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">${item.bahasa==null ? '-':item.bahasa}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Deskripsi</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">${item.deskripsi==null ? '-':item.deskripsi}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-muted" style="font-weight: 500">Lokasi Koleksi</span></td>
                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                            <td><span style="margin-left: 5%;">
                                                                ${item.lokasis.departemen}
                                                            </span></td>
                                                        </tr>
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
            </div>
        </div>
        <form class="form-horizontal form-material" action="${katalog_route}/${item.id_katalog}/edit" method = "GET">
            <button type="submit" class="btn btn-warning" title="Ubah Katalog"><i class="ti-pencil-alt"></i></button>
            <input type="hidden" name="id" value="${item.id_katalog}" />
        </form>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-${item.id_katalog}" data-plaement="top" title="Hapus Data Katalog"><i class="ti-trash"></i></button>
        <div class="modal fade" id="delete-${item.id_katalog}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus ${item.judul}</h4> 
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-material" action="${katalog_route}/${item.id_katalog}" method = "POST">
                            <input type="hidden" name="id" value="${item.id_katalog}" />
                            <h5> Apakah Anda yakin untuk menghapus data katalog "${item.judul}"? </h5>
                            <div class="form-group m-b-0">
                                <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Hapus</button>
                            </div>
                            @method('delete')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
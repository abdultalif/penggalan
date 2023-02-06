@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active">Projek</li>
@endsection

@section('title', 'Projek')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-card>
            <x-slot name="header">
                <button class="btn btn-primary" onclick="addForm(`{{ route('campaign.store') }}`)"><i class="fas fa-plus-circle"></i> Tambah</button>
            </x-slot>

            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th widht="5%">No</th>
                        <th></th>
                        <th>Deskripsi</th>
                        <th>Tgl Publish</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </x-slot>
            </x-table>
        </x-card>
    </div>
</div>

<x-modal size="modal-lg" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah Projek
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" placeholder="Masukan Judul" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="categories">Kategori</label>
                <select name="categories" id="categories" class="form-control select2">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Deskripsi Singkat</label>
        <textarea name="short_description" id="short_description" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Konten</label>
        <textarea name="body" id="body" rows="3" class="form-control summernote"></textarea>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="publish_date">Tanggal Publish</label>
                <div class="input-group datetimepicker" id="publish_date" data-target-input="nearest">
                    <input type="text" name="publish_date" class="form-control datetimepicker-input" data-target="#publish_date" />
                    <div class="input-group-append" data-target="#publish_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="status" class="form-control">
                    <option disabled selected>Pilih Status</option>
                    <option value="publish">Publish</option>
                    <option value="archived">Diarsipkan</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Goal</label>
                <input type="text" name="goal" id="goal" class="form-control" onkeyup="format_uang(this)">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="end_date">Tanggal Selesai</label>
                <div class="input-group datetimepicker" id="end_date" data-target-input="nearest">
                    <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#end_date" />
                    <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="note">Tulis ajakan singkat untuk mengajak orang berdonasi</label>
        <textarea name="note" id="note" class="form-control" rows="3"></textarea>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="receiver">Penerima</label>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" id="saya" value="Saya Sendiri">
                    <label class="custom-control-label font-weight-normal" for="saya">Saya Sendiri</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" id="keluarga" value="Keluarga / Kerabat">
                    <label class="custom-control-label font-weight-normal" for="keluarga">Keluarga / Kerabat</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" id="organisasi" value="Organisasi / Lembaga">
                    <label class="custom-control-label font-weight-normal" for="organisasi">Organisasi / Lembaga</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" id="lainnya" value="Lainnya">
                    <label class="custom-control-label font-weight-normal" for="lainnya">Lainnya</label>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image" onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>

            <img src="" class="img-thumbnail preview-path_image" style="display: none;">
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>
</x-modal>
@endsection

@includeIf('include.datatable')
@includeIf('include.select2')
@includeIf('include.summernote')
@includeIf('include.datepicker')

@push('script')
<script>
    let modal = '#modal-form';
    let table;

    $('.table').DataTable();

    function addForm(url, title = 'Tambah Projek') {
        // Untuk menampilkan modal
        $(modal).modal('show');
        // untuk menampilkan tulisan di header
        $(`${modal} .modal-title`).text(title);
        // mengirim semua data kedalam controller melalui action
        $(`${modal} form`).attr('action', url);

        resetForm(`${modal} form`);

    }

    function editForm(url, title = 'Edit Projek') {
        $.get(url)
            .done(response => {
                // Untuk menampilkan modal
                $(modal).modal('show');
                // untuk menampilkan tulisan di header
                $(`${modal} .modal-title`).text(title);
                // mengirim semua data kedalam controller melalui action
                $(`${modal} form`).attr('action', url);
                $(`${modal} [name=_method]`).val('post');

                resetForm(`${modal} form`);
                loopForm(response.data);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            })
    }

    function submitForm(originalForm) {
        $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            })
            .done(response => {
                $(modal).modal('hide');
                showAlert(response.massage, 'success');
                table.ajax.reload();
            })
            .fail(errors => {
                if (errors.status == 422) {
                    loopErrors(errors.responseJSON.errors);
                    return
                }

                showAlert(errors.responseJSON.errors, 'danger');
            });
    }

    function deleteData(url) {
        if (confirm('Yakin data akan dihapus?')) {
            $.post(url, {
                    '_method': 'delete'
                })
                .done(response => {
                    showAlert(response.massage, 'success');
                    table.ajax.reload();
                })
                .fail(errors => {
                    showAlert('Tidak dapat menghapus data');
                    return;
                })
        }
    }

    function resetForm(selector) {
        $(selector)[0].reset();

        $('.select2').trigger('change');
        $('form-control, .custom-select, .custom-checkbox, .custom-radio, .select2').removeClass('is-invalid');
        $('.invalid-feedback').remove();
    }

    function loopForm(originalForm) {
        for (field in originalForm) {
            if ($(`[name=${filed}]`).attr('type') != 'file') {
                if ($(`[name=${field}]`).hasClass('summernote')) {
                    $(`[name=${field}]`).summernote('code', originalForm[field]);
                }

                $(`[name=${field}]`).val(originalForm[filed]);
                $('select').trigger('change');
            }
        }
    }

    function loopErrors(errors) {
        $('.invalid-feedback').remove();

        if (errors == undefined) {
            return;
        }

        for (error in errors) {
            $(`[name=${error}]`).addClass('is-invalid');

            if ($(`[name=${error}]`).hasClass('select2')) {
                $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                    .insertAfter($(`[name=${error}]`).next());
            } else if ($(`[name=${error}]`).hasClass('summernote')) {
                $('.note-editor').addClass('is-invalid');
                $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                    .insertAfter($(`[name=${error}]`).next());
            } else if ($(`[name=${error}]`).hasClass('custom-control-input')) {
                $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                    .insertAfter($(`[name=${error}]`).next());
            } else {
                if ($(`[name=${error}]`).length == 0) {
                    $(`[name="${error}[]"]`).addClass('is-invalid');
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                        .insertAfter($(`[name="${error}[]"]`).next());
                } else {
                    if ($(`[name=${error}]`).next().hasClass('input-group-append') || $(`[name=${error}]`).next().hasClass('input-group-prepend')) {
                        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                            .insertAfter($(`[name=${error}]`).next());
                        $('.input-group-append .input-group-text').css('border-radius', '0 .25rem .25rem 0');
                        $('.input-group-prepend').next().css('border-radius', '0 .25rem .25rem 0');
                    } else {
                        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                            .insertAfter($(`[name=${error}]`));
                    }
                }

            }
        }
    }
</script>
@endpush
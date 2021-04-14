let modal = new bootstrap.Modal(document.getElementById('modal-produk'), {
    keyboard: false
})

function deleteForm(id) {
    Swal.fire({
        title: 'Apa anda yakin?',
        text: "data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#28a745',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: `/produk/${id}`,
                method: `DELETE`,
                success: function (ress) {
                    console.log(ress);
                    if (ress.status === "success") {
                        notifAlert1('Sukses', 'Data Berhasil Dihapus', 'success')
                    }
                },
                error: function (err) {
                    if (err.status == 404) {
                        notifAlert1('Error', 'Data tidak ada', 'error')
                    }
                }
            })
        }
    })
}

function add() {
    modal.show()
    save_method = "add"
    $('input[name="_method"]').val('POST');
    $('.produk').validate().resetForm()
    $('.btn-submit').prop("disabled", false)
    $('#modal-produk form')[0].reset()
    $('.modal-title').html('Tambah Data Produk')
}

function editForm(id) {
    save_method = "update"
    update_id = id
    $('input[name="_method"]').val('PATCH');
    $.ajax({
        url: `/produk/${id}/edit`,
        type: 'GET',
        success: function (ress) {
            let {
                data
            } = ress
            console.log(data);
            $('.modal-title').html('Ubah Data Produk')
            $('#modal-produk form')[0].reset()
            $('.produk').validate().resetForm()
            $('#keterangan').val(data.keterangan)
            $('#jumlah').val(data.jumlah)
            $('#harga').val(data.harga)
            $('#nama_produk').val(data.nama_produk)
            modal.show()
            checkChangeFormData($('.btn-submit'), $('.produk'), $('.produk :input'))
        },
        error: function (xhr, status, error) {
            if (xhr.status == 404) {
                notifAlert1('Error', 'Data tidak ada', 'error')
            }
            let all_error = JSON.parse(xhr.responseText)
            $.each(all_error.errors, function (key, error) {
                console.log(key, error)
            })
        }
    })
}

function checkChangeFormData(button, form, event) {
    button.prop("disabled", true)
    let forms = form.serialize()
    event.on('change input keyup', function () {
        if (forms !== form.serialize()) {
            button.prop("disabled", false)
        } else {
            button.prop("disabled", true)
        }
    });
}

function notifAlert1(header, pesan, type) {
    Swal.fire(
        `${header}`,
        `${pesan}`,
        `${type}`
    ).then((result) => {
        if (result.isConfirmed) {
            window.location.reload();
        }
    })
}

$(function () {
    //validation
    $('.produk').validate({
        rules: {
            nama_produk: {
                required: true,
                minlength: 5,
                maxlength: 225,
            },
            harga: {
                number: true,
                required: true,
                minlength: 1,
            },
            jumlah: {
                number: true,
                required: true,
                minlength: 1,
                maxlength: 11,
            },
            keterangan: {
                required: true,
                minlength: 5,
            }
        },
        messages: {},
        submitHandler: function (form, event) {
            if (!event.isDefaultPrevented()) {
                if (save_method == "add") {
                    url = "/produk"
                    sendType = "POST"
                } else {
                    url = `/produk/${update_id}`
                    sendType = "POST"
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: url,
                    type: sendType,
                    data: new FormData($('.produk')[0]),
                    processData: false,
                    contentType: false,
                    success: function (ress) {
                        console.log(ress);
                        if (ress.status === "success") {
                            notifAlert1("Sukses", "Data Produk berhasil disimpan",
                                "success")
                        } else if (ress.status === "updated") {
                            notifAlert1("Sukses", "Data Produk berhasil Ubah",
                                "success")
                        }
                        modal.hide();
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status == 404) {
                            notifAlert1('Error', 'Data tidak ada', 'error')
                        }
                        let all_error = JSON.parse(xhr.responseText)
                        $.each(all_error.errors, function (key, error) {
                            $(`#${key}`).parent().append(`
    <label id="${key}-error" class="error" for="${key}"> ${error} </label>
    `)
                        })
                    }
                })
                return false;
            }
            return false
        }
    })
    //end validation
})

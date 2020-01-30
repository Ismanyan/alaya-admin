<link rel="stylesheet" href="<?= asset_url() . 'css/pages/treatment.css' ?>">
<script src="<?= asset_url() . 'js/ellipsis/jquery.ellipsis.min.js' ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<style>
    p {
        margin-bottom: 0px !important;
    }
</style>
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/icons/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Absent</a>
    </nav>


    <div class="container mt-4">
        <div class="loader">
            <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                <h4 class="spinner-text">Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>

        <div class="alert alert-danger animated shake text-center" role="alert">
            Tidak ada absent
        </div>

        <div class="datas">

        </div>

        <a href="#" class="float" data-sort="DESC">
            <img class="my-float" src="<?= asset_url() . 'img/icons/sort.png' ?>" alt="Sort">
        </a>

    </div>

    <script>
        var base_url = $('.base_url').val();
        var assets_url = $('.assets_url').val();
        var branch_id = $('.branch_id').val();
        $('.alert').hide();

        function first(x) {
            var status = x;

            $.ajax({
                url: base_url + 'absent/get/all/' + branch_id,
                type: 'get',
                success: function(response) {
                    $('.loader').hide();
                    var x = JSON.parse(response);

                    // console.log(x);

                    // DESC
                    if (status == true) {
                        console.log(status)
                        x.sort(function(a, b) {
                            return a - b
                        });
                    }

                    if (x.length == 0) {
                        $('.alert').show();
                    } else {
                        $.each(x, function(key, value) {
                            $('.datas').append(`
                                <div class="data-` + key + `"></div>
                            `);
                            if (value.absent_status == 0) {
                                $('.data-' + key).append(`
                                    <a class="text-decoration-none" href="` + base_url + 'absent/history/detail/' + value.id + `">
                                        <div class="row my-4 border-bottom animated fadeIn slow">
                                            <div class="col-5">
                                                <img class="treatment-img w-100" src="` + assets_url + 'img/slide/slide3.jpg' + `" style="#">
                                                <a href="#" class="btn btn-secondary mt-2 w-100" onClick="confirm(` + value.id + `)">Confirm</a>
                                            </div>
                                            <div class="col-7">
                                                <h5 class="head-title text-truncate">` + value.fullname + `</h5>
                                                <p class="durations">ID : ` + value.user_id + `</p>
                                                <p class="durations">Cabang : ` + value.branch_name + `</p>
                                                <p class="durations">Waktu Masuk : ` + value.absent_time + `</p>
                                                <p class="durations">Tanggal Masuk : ` + value.absent_date + `</p>
                                                </br>
                                            </div>
                                        </div>
                                    </a>
                                `);
                            } else {
                                $('.data-' + key).append(`
                                    <a class="text-decoration-none" href="` + base_url + 'absent/history/detail/' + value.id + `">
                                        <div class="row my-4 border-bottom animated fadeIn slow">
                                            <div class="col-5">
                                                <img class="treatment-img w-100" src="` + assets_url + 'img/slide/slide3.jpg' + `" style="#">
                                            </div>
                                            <div class="col-7">
                                                <h5 class="head-title text-truncate">` + value.fullname + `</h5>
                                                <p class="durations">ID : ` + value.user_id + `</p>
                                                <p class="durations">Cabang : ` + value.branch_name + `</p>
                                                <p class="durations">Waktu Masuk : ` + value.absent_time + `</p>
                                                <p class="durations">Tanggal Masuk : ` + value.absent_date + `</p>
                                                </br>
                                            </div>
                                        </div>
                                    </a>
                                `);
                            }
                        });
                        $('.desc').ellipsis({
                            row: 2
                        });
                    }
                }
            });
        }

        first(null);

        $('.float').click(function() {
            var x = $(this).data('sort')
            // console.log(x);
            $('.loader').show();
            $('.datas').html('');

            if (x == 'DESC') {
                first(true);
                $('.float').data('sort', 'ASC');
            } else if (x == 'ASC') {
                first(null);
                $('.float').data('sort', 'DESC');
            }
        });

        // console.log(base_url);

        function confirm(x) {
            var id = x;
            $('.datas').hide();
            $('.loader').show();
            $.ajax({
                url: base_url + 'absent/confirm',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    $('.loader').hide();
                    $('.datas').html('');
                    $('.datas').show();
                    first(null);

                    let x = JSON.parse(response);
                    console.log(x);
                    if (x.code == 200) {
                        Swal.fire({
                            title: "Konfirmasi Sukses",
                            icon: 'success',
                            text: "Absent berhasil di konfirmasi",
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            title: "Konfirmasi Gagal",
                            icon: 'error',
                            text: "Silahkan hubungi Super Admin",
                            timer: 2000,
                            footer: '<a href="tel:+">Hubungi Admin</a>',
                        });
                    }
                }
            });
        }
    </script>
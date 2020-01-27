<link rel="stylesheet" href="<?= asset_url() . 'css/pages/treatment.css' ?>">
<script src="<?= asset_url() . 'js/ellipsis/jquery.ellipsis.min.js' ?>"></script>
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url('statistic') ?>">
            <img src="<?= asset_url() . 'img/icons/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>My Treatment</a>
    </nav>


    <div class="container mt-4">
        <div class="loader">
            <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                <h4 class="spinner-text">Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>


        <div class="datas">
            <div class="alert alert-warning" role="alert">
                Tidak ada treatment
            </div>
        </div>
    </div>

    <script>
        var base_url = $('.base_url').val();
        var id_user = $('.id_user').val();
        var assets_url = $('.assets_url').val();

        $('.datas').hide();

        $.ajax({
            url: base_url + 'treatment/get/history/' + id_user,
            type: 'get',
            success: function(response) {
                $('.loader').hide();
                $('.datas').show();
                var x = JSON.parse(response);
                if (x.length == 0) {
                    $('.alert').show();
                } else {
                    $.each(x, function(key, value) {
                        $('.datas').append(`
                            <div class="data-` + key + `"></div>
                        `);

                        $('.data-' + key).append(`
                            <a class="text-decoration-none" href="` + base_url + 'treatment/history/detail/' + value.treatment_history_id + `">
                                <div class="row my-4 border-bottom animated fadeIn slow">
                                    <div class="col-5">
                                        <img class="treatment-img w-100" src="` + assets_url + 'img/slide/slide3.jpg' + `" style="#">
                                        <p class="m-0 text-center desc">Start at ` + value.treatment_time + `</p>
                                        <p class="m-0 text-center desc">Done at ` + value.treatment_end + `</p>
                                    </div>
                                    <div class="col-7">
                                        <h5 class="head-title text-truncate">` + value.treatment_name + `</h5>
                                        <p class="desc">` + value.treatment_desc + `</p>
                                    </div>
                                </div>
                            </a>
                        `);
                    });
                    $('.desc').ellipsis({
                        row: 4
                    });
                }
            }
        });
    </script>
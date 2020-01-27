<link rel="stylesheet" href="<?= asset_url() . 'css/pages/treatment.css' ?>">
<script src="<?= asset_url() . 'js/ellipsis/jquery.ellipsis.min.js' ?>"></script>
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/icons/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Treatment by Therapist</a>
    </nav>


    <div class="container mt-4">
        <div class="loader">
            <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                <h4 class="spinner-text">Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>

        <div class="alert alert-danger animated shake text-center" role="alert">
            Tidak ada treatment
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
                url: base_url + 'treatment/get/all/' + branch_id,
                type: 'get',
                success: function(response) {
                    $('.loader').hide();
                    var x = JSON.parse(response);

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
                            $('.data-' + key).append(`
                                <a class="text-decoration-none" href="` + base_url + 'treatment/history/detail/' + value.id + `">
                                    <div class="row my-4 border-bottom animated fadeIn slow">
                                        <div class="col-5">
                                            <img class="treatment-img w-100" src="` + assets_url + 'img/slide/slide3.jpg' + `" style="#">
                                        </div>
                                        <div class="col-7">
                                            <h5 class="head-title text-truncate">` + value.treatment_name + `</h5>
                                            <p class="desc">` + value.treatment_desc + `</p>
                                            <p class="durations">` + 'Waktu Pengerjaan ' + '<br>' + value.history_duration + ' Minute' + `</p>
                                        </div>
                                    </div>
                                </a>
                            `);
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
    </script>
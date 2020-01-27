<link rel="stylesheet" href="<?= asset_url() . 'css/pages/detail-treatment.css' ?>">
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>
    <input type="hidden" class="detailId" value="<?= $detailId ?>">

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/icons/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Treatment Detail</a>
    </nav>

    <div class="container text-center mt-3">
        <img class="w-100 treatment-image shadow" src="" alt="" srcset="">

        <div class="loader mt-3">
            <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                <h4 class="spinner-text">Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>

        <div class="alert alert-danger animated shake text-center" role="alert">
            Tidak ada Treatment
        </div>


        <div class="data mt-3">
            <h4 class="treatment-detail"></h4>
            <p class="treatment-desc"></p>
            <hr>
            <div class="info text-left">
                <p><b>Duration</b> : <span class="treatment_duration"></span> Minutes</p>
                <p><b>Price</b> : Rp.<span class="treatment_price"></span></p>
                <p><b>Therapist Name</b> : <span class="therapist_name"></span></p>
                <p><b>Treatment Time</b> : <span class="treatment_time"></span></p>
                <p><b>Treatment Date</b> : <span class="treatment_date"></span></p>
                <p><b>Start Treatment</b> : <span class="treatment_time_start"></span></p>
                <p><b>Done Treatment</b> : <span class="treatment_time_end"></span></p>
            </div>
        </div>

    </div>

    <script>
        var base_url = $('.base_url').val();
        var detailId = $('.detailId').val();
        var assets_url = $('.assets_url').val();
        $('.alert').hide();
        $('.data').hide();
        $.ajax({
            url: base_url + "treatment/get/history/detail/" + detailId,
            type: 'get',
            success: function(response) {
                let x = JSON.parse(response);
                $('.loader').hide();
                console.log(x);
                if (x.length == 1) {
                    $('.treatment-image').attr('src', assets_url + 'img/slide/slide3.jpg');
                    $('.therapist_name').append(x[0].fullname);
                    $('.treatment-detail').append(x[0].treatment_name);
                    $('.treatment-desc').append(x[0].treatment_desc);
                    $('.treatment_duration').append(x[0].history_duration);
                    $('.treatment_price').append(x[0].treatment_price);
                    $('.treatment_time').append(x[0].treatment_time + ' - ' + x[0].treatment_end);
                    $('.treatment_date').append(x[0].treatment_date);
                    $('.treatment_time_start').append(x[0].treatment_time);
                    $('.treatment_time_end').append(x[0].treatment_end);
                    $('.data').show();
                } else {
                    $('.alert').show();
                }
            }
        });
    </script>
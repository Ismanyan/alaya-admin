<link rel="stylesheet" href="<?= asset_url() . 'css/pages/detail-treatment.css' ?>">
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>
    <input type="hidden" class="detailId" value="<?= $detailId ?>">

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url('treatment') ?>">
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

        <div class="data mt-3">
            <h4 class="treatment-detail"></h4>
            <p class="treatment-desc"></p>
        </div>
    </div>

    <script>
        var base_url = $('.base_url').val();
        var detailId = $('.detailId').val();
        var assets_url = $('.assets_url').val();
        $('.data').hide();
        $.ajax({
            url: base_url + "treatment/get/detail/" + detailId,
            type: 'get',
            success: function(response) {
                $('.treatment-image').attr('src', assets_url + 'img/slide/slide3.jpg');
                let x = JSON.parse(response);
                $('.loader').hide();
                $('.treatment-detail').append(x[0].treatment_name);
                $('.treatment-desc').append(x[0].treatment_desc);
                $('.data').show();
            }
        });
    </script>
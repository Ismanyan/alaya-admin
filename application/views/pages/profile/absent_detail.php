<link rel="stylesheet" href="<?= asset_url() . 'css/pages/detail-treatment.css' ?>">
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>
    <input type="hidden" class="detailId" value="<?= $detailId ?>">

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url('absent') ?>">
            <img src="<?= asset_url() . 'img/icons/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Absent Detail</a>
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
            Tidak ada Absent
        </div>

        <div class="data mt-3">
            <div class="card shadow border-0 p-3 text-left info">
                <table>
                    <tr>
                        <td>
                            <p><b>User ID</b></p>
                        </td>
                        <td>
                            <p class="user_id">: </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Cabang</b></p>
                        </td>
                        <td>
                            <p class="branch_name">: </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Position</b></p>
                        </td>
                        <td>
                            <p class="position_name">: </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Waktu Masuk</b></p>
                        </td>
                        <td>
                            <p class="absent_time">: </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Jam Masuk Kerja</b></p>
                        </td>
                        <td>
                            <p class="open_hour">: </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Alamat</b></p>
                        </td>
                        <td>
                            <p class="address">: </p>
                        </td>
                    </tr>
                </table>
            </div>

            <a href="" class="btn btn-secondary w-100 my-3 p-2 maps" target="_blank">View On Maps</a>
        </div>
    </div>

    <script>
        var base_url = $('.base_url').val();
        var detailId = $('.detailId').val();
        var assets_url = $('.assets_url').val();
        $('.alert').hide();

        $('.data').hide();
        $.ajax({
            url: base_url + "absent/get/history/detail/" + detailId,
            type: 'get',
            success: function(response) {
                let x = JSON.parse(response);
                $('.loader').hide();
                if (x.length == 1) {
                    $('.treatment-image').attr('src', assets_url + 'img/slide/slide3.jpg');
                    console.log(x);
                    $('.user_id').append(x[0].user_id);
                    $('.branch_name').append(x[0].branch_name);
                    $('.position_name').append(x[0].position_name);
                    $('.absent_time').append(x[0].absent_time);
                    $('.open_hour').append(x[0].open_hour);
                    $('.address').append(x[0].address);
                    $('.maps').attr('href', 'https://maps.google.com/?q='+x[0].latitude+','+ x[0].longitude);
                    // $('.treatment_time_end').append(x[0].treatment_end);
                    $('.data').show();
                } else {
                    $('.alert').show();
                }
            }
        });
    </script>
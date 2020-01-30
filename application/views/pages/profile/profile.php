<link rel="stylesheet" href="<?= asset_url() . 'css/pages/profile.css' ?>">
</head>

<body>
    <input type="hidden" class="idUser" value="<?= $this->session->id_admin ?>">
    <?php $this->load->view('layouts/url'); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/icons/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Your Profile</a>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                <img class="rounded profile data" src="<?= asset_url() . 'img/' ?>profile.jpg" width="100" height="100">
            </div>
            <div class="col-8">
                <h4 class="text-truncate"><?= $this->session->fullname_admin ?></h4>
                <p class="m-0 text-truncate user_id">ID : </p>
            </div>
        </div>

        <div class="row my-5 animated fadeInUp slow">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body loader">
                        <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                            <h4 class="spinner-text">Loading...</h4>
                            <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div>

                    <div class="card-body data">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="<?= asset_url() . 'img/icons/id.png' ?>" alt="id" width="23">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom user_id">ID : </p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="<?= asset_url() . 'img/icons/location.png' ?>" alt="location" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom address"></p>
                                </div>
                            </li>
                            <li class="media mt-2">
                                <img class="mr-3" src="<?= asset_url() . 'img/icons/cabang.png' ?>" alt="cabang" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom branch_name"></p>
                                </div>
                            </li>
                            <li class="media mt-1">
                                <img class="mr-3" src="<?= asset_url() . 'img/icons/position.png' ?>" alt="position" width="20">
                                <div class="media-body">
                                    <p class=" border-bottom position_name"></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row animated fadeInUp slow">
            <div class="col-12">
                <div class="card shadow border-0">
                    <a href="<?= base_url('logout') ?>" class="btn btn-primary bg-transparent border-0">
                        <div class="row">
                            <div class="col">
                                <img class="float-left" src="<?= asset_url() . 'img/icons/exit-app.png' ?>" alt="logout" width="20">
                            </div>
                            <div class="col">
                                <p>Log Out</p>
                            </div>
                            <div class="col">
                                <img class="float-right" src="<?= asset_url() . 'img/icons/btnlogout.png' ?>" alt="logout" width="20">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var base_url = $('.base_url').val();
        var idUser = $('.idUser').val();
        $('.data').hide();
        $.ajax({
            url: base_url + "profile/get/" + idUser,
            type: 'get',
            success: function(response) {
                let x = JSON.parse(response);
                console.log(x[0]);
                $('.user_id').append(x[0].user_id);
                $('.address').append(x[0].address);
                $('.branch_name').append(x[0].branch_name);
                $('.position_name').append(x[0].position_name);
                $('.loader').hide();
                $('.data').show();
            }
        });
    </script>
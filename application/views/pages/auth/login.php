<link rel="stylesheet" href="<?= asset_url() . 'css/splashscreen.css' ?>">
<link rel="stylesheet" href="<?= asset_url() . 'css/auth/login.css' ?>">
</head>

<body>
    <?php $this->load->view('layouts/url'); ?>

    <div id="splashscreen" class="splashscreen">
        <img class="w-75 mx-auto d-block " src="<?= asset_url() . 'img/logo/alayaspa.png' ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">
        <div class="text-center text-pink">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <div class="container mt-5 animated fadeIn text-center formLogin">
        <h3 style="color:#474d53" class="mb-5">Login</h3>
        <!-- Form -->
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="alert err alert-danger animated shake" role="alert">
                                User tidak dapat di temukan
                            </div>
                            <div class="alert req alert-warning animated shake" role="alert">
                                User ID & Password tidak boleh kosong
                            </div>
                            <!-- UserID -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text bg-white border-0" id="userid">
                                        <img src="<?= asset_url() . 'img/icons/profile.png'; ?>" alt="" srcset="" width="23">
                                    </span>
                                </div>
                                <input type="text" class="form-control userId" placeholder="User ID" aria-label="UserID" aria-describedby="basic-addon1" name="userId" required>
                            </div>
                            <!-- Password -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text bg-white border-0" id="userid">
                                        <img src="<?= asset_url() . 'img/icons/password.png'; ?>" alt="" srcset="" width="23">
                                    </span>
                                </div>
                                <input type="password" class="form-control password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="userId" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-login mt-5 bg-pink w-100 text-center animated fadeInUp slow">LOG IN <img class="float-right" src="<?= asset_url() . 'img/icons/btnlogin2.png' ?>" width="23" alt="next"></button>
                </div>
            </div>
        </form>
    </div>

    <!-- CUSTOM SCRIPT FOR THIS PAGE -->
    <script>
        var base_url = $('.base_url').val();
        $('.err').hide();
        $('.req').hide();
        $('.splashscreen').hide();

        $('.btn-login').click(function() {


            var userId = $('.userId').val();
            var password = $('.password').val();

            if (userId.length == 0 || password.length == 0) {
                $('.req').show();
            } else {
                $('.splashscreen').show();
                $('.formLogin').hide();
                $.ajax({
                    url: base_url + 'login/check',
                    type: 'post',
                    data: {
                        user_id: userId,
                        password: password
                    },
                    success: function(response) {
                        let responses = JSON.parse(response);
                        if (responses.code == 200) {
                            $('.splashscreen').hide();
                            document.location.href = base_url + 'pin';
                        } else {
                            $('.splashscreen').hide();
                            $('.alert').show();
                            $('.formLogin').show();
                        }
                    }
                });
            }
        });
    </script>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 bg-transparent my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h1 text-white mb-4 font-weight-bold">
                                        Paw Paw
                                        <i class="fas fa-paw"></i>
                                    </h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <label class="h5 text-white" for="username">Username</label>
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>" autofocus>
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="h5 text-white" for="username">Password</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password...">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-user mt-4">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
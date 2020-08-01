<header>
    <div class="bg-dark py-2">
        <div class="container">
            <div class="d-flex">
                <form class="form-inline mr-auto" method="get" action="">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input value="<?php echo $this->input->get('s') ?>" type="text" class="form-control" name="s" placeholder="Keyword" aria-label="Keyword"
                               aria-describedby="basic-addon1">
                    </div>
                </form>
                <div class="user">
                    <?php
                    if (auth()) { ?>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                echo auth()['name'] ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?php
                                echo site_url('auth/logout') ?>">Logout</a>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <a href="/auth/login" class="btn btn-primary">
                            <i class="fa fa-user" aria-hidden="true"></i> Login
                        </a>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</header>
<main role="main" class="mt-2">
    <div class="container">
        <?php
        foreach ($posts['items'] as $post) {
            view('components/card-box', array('post' => $post));
        }
        ?>
        <?php echo $posts['paginate'] ?>
    </div>
</main>

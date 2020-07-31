<header>
    <div class="bg-dark py-2">
        <div class="container">
            <div class="d-flex">
                <form class="form-inline mr-auto">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Keyword" aria-label="Username"
                               aria-describedby="basic-addon1">
                    </div>
                </form>
                <div class="login">
                    <a href="/auth/login" class="btn btn-primary">
                        <i class="fa fa-user" aria-hidden="true"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<main role="main" class="mt-2">
    <div class="container">
        <?php
        foreach ($posts as $post) {
            view('components/card-box', array('post' => $post));
        }
        ?>
    </div>
</main>

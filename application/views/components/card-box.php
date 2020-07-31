<div class="card my-2">
    <div class="card-body">
        <div class="profile d-flex">
            <?php
            view('components/avatar') ?>
            <div class="ml-2">
                <h6 class="mb-0"><?= $post['user_name'] ?></h6>
                <p class="small"><?= datetime_to_timestamp($post['created_at']) ?></p>
            </div>
        </div>
        <div class="content"><?= $post['content'] ?></div>
        <div class="more">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?= $post['likes'] ?>
            <i class="fa fa-commenting-o ml-2" aria-hidden="true"></i> <?= $post['comments'] ?>
        </div>
    </div>
</div>

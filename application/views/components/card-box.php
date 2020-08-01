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
        <div class="container more mt-2 d-flex align-items-center">
            <i class="fa fa-thumbs-o-up mr-1" aria-hidden="true"></i> <?= $post['likes'] ?>
            <i class="fa fa-commenting-o ml-2 mr-1" aria-hidden="true"></i> <?= $post['comments'] ?>
            <?php if (isset($post['mutual_friends']) && (bool)$post['mutual_friends']) { ?>
                <button type="button" class="btn btn-link ml-auto">
                    <i class="fa fa-commenting-o mr-1" aria-hidden="true"></i> Leave a comment
                </button>
            <?php } ?>
        </div>
    </div>
</div>

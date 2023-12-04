<?php
/**
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \BcBlog\View\BlogFrontAppView $this
 * @var \Cake\ORM\ResultSet $posts
 */
?>
<?php if ($posts->count()): ?>
  <h2>
    <?php echo h($this->BcBaser->getBlogTitle()) ?>
  </h2>
  <div class="row">
    <?php foreach($posts as $key => $post): ?>
      <div class="col span-4">
        <a href="<?php echo $this->BcBaser->getBlogPostLinkUrl($post) ?>">
          <figure>
            <?php $this->BcBaser->blogPostEyeCatch($post, ['link' => false, 'title' => $this->Blog->getPostTitle($post, false), 'noimage' => 'noimage.jpg']); ?>
            <figcaption><?php $this->BcBaser->blogPostTitle($post, false)?></figcaption>
          </figure>
        </a>
      </div>
      <?php if ($key % 3 === 2): ?>
        </div>
        <div class="row">
      <?php endif ?>
    <?php endforeach ?>
  </div>
  <p class="center">
    <?php $this->BcBaser->link('その他のギャラリー', $this->BcBaser->getBlogContentsUrl($this->Blog->currentBlogContent->id, false), ['class' => 'button']) ?>
  </p>
<?php endif ?>

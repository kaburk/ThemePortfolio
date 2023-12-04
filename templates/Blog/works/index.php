<?php
/**
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \BcBlog\View\BlogFrontAppView $this
 * @var \Cake\ORM\ResultSet $posts
 */
$this->BcBaser->setDescription($this->Blog->getDescription());
$this->BcBaser->setTableToUpload('BcBlog.BlogPosts');
$this->BcBaser->setTitle($this->BcBaser->getBlogTitle());
?>

<h2><?php echo h($this->Blog->getTitle()) ?></h2>

<?php if ($this->BcBaser->blogDescriptionExists()): ?>
<div class="bs-blog-description"><?php $this->BcBaser->blogDescription() ?></div>
<?php endif ?>

<?php if ($posts->count()): ?>
  <div class="row">
    <?php foreach($posts as $key => $post): ?>
      <div class="col span-4">
        <a href="<?php echo $this->BcBaser->getBlogPostLinkUrl($post) ?>">
          <figure>
            <?php $this->BcBaser->blogPostEyeCatch($post, ['link' => false, 'title' => $this->Blog->getPostTitle($post, false)]); ?>
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
<?php else: ?>
  <div class="row">
    <p class="bs-blog-no-data"><?php echo __d('baser_core', '記事がありません。'); ?></p>
  </div>
<?php endif ?>

<?php $this->BcBaser->pagination('simple'); ?>

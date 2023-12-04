<?php
/**
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \BcBlog\Model\Entity\BlogCategory $blogCategory
 * @var \BcBlog\Model\Entity\BlogTag $blogTag
 * @var \BaserCore\Model\Entity\User $author
 * @var \Cake\ORM\ResultSet $posts
 * @var string $blogArchiveType
 * @var string $year
 * @var string $month
 * @var string $day
 */
$title = '';
if($blogArchiveType === 'category') $title = $blogCategory->title;
if($blogArchiveType === 'author') $title = $author->getDisplayName();
if($blogArchiveType === 'tag') $title = rawurldecode($blogTag->name);
if($blogArchiveType === 'daily') $title = sprintf(__d('baser_core', '%s年%s月%s日'), $year, $month, $day);
if($blogArchiveType === 'monthly') $title = sprintf(__d('baser_core', '%s年%s月'), $year, $month);
if($blogArchiveType === 'yearly') $title = sprintf(__d('baser_core', '%s年'), $year);
$this->BcBaser->setTitle($title);
$this->BcBaser->setDescription($this->BcBaser->getBlogTitle() . '｜' . $this->BcBaser->getContentsTitle() . __d('baser_core', 'のアーカイブ一覧です。'));
$this->BcBaser->setTableToUpload('BcBlog.BlogPosts');
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

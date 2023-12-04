<?php
/**
 * @var \BaserCore\View\AppView $this
 */
?>
<div class="mainimg">
  <?php $this->BcBaser->mainImage(['all' => true, 'num' => 5]) ?>
</div>

<main>
  <section>
    <div class="container">
      <?php $this->BcBaser->blogPosts('works', 9) ?>
    </div>
  </section>

  <section class="container">
    <?php $this->BcBaser->content() ?>
  </section>
</main>

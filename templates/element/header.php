<?php
/**
 * @var \BaserCore\View\AppView $this
 */
?>
<header>
  <div class="container">
    <div class="row">
      <div class="col span-12">
        <div class="head">
          <h1><?php $this->BcBaser->logo() ?></h1>
          <div class="snsbox">
            <?php $this->BcBaser->link($this->BcBaser->getImg('in-icon.png', ['alt' => 'Instagram']), '__DUMMY__', ['escape' => false]); ?>
            <?php $this->BcBaser->link($this->BcBaser->getImg('fb-icon.png', ['alt' => 'Facebook']), '__DUMMY__', ['escape' => false]); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col span-12">
        <nav>
          <div id="open"></div>
          <div id="close"></div>
          <div id="navi">
            <?php if (\BaserCore\Utility\BcUtil::isInstalled()): ?>
              <?php $this->BcBaser->globalMenu() ?>
            <?php endif ?>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>

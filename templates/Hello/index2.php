<div>
  <h3>Index Page</h3>
  <p><?= $message ?></p>
  <form method="post" action="/cakephp4/hello/index">
  <?=$this->Form->create(null,[
        'type' => 'post',
        'url' => ['controller' => 'Hello', 'action' => 'index']]
    ) ?>
    <?=$this->Form->text('text1') ?>
    <?=$this->Form->submit('OK') ?>
    <?=$this->Form->end() ?>
    </form>

    <!-- CSRF token from either the request body or request headers did not match or is missing.
  <input
    type="hidden" name="_csrfToken" autocomplete="off"
    value="<?= $this->request->getAttribute('csrfToken') ?>"> -->
    <!-- ここまで追加 -->
  <!-- <input type="text" name="text1">
  <input type="submit">
  </form> -->
</div>
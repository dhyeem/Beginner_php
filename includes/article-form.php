<?php if (!empty($article->errors)): ; ?>
      <ul>
      <?php foreach ($article->errors as $error) :?>
      <li><?= $error ?></li>
      <?php endforeach ;?>
    <?php endif ;?>
      </ul>
<form class="" action="" method="post">
  <div class="">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->title) ;?>">
  </div>
  <div class="">
    <label for="content">Content</label>
    <textarea name="content"  id="content" rows="8" cols="80" placeholder='Article Conent' ><?= htmlspecialchars($article->content);?></textarea>
  </div>
  <div>
        <label for="published_at">Publication date and time</label>
        <input type="datetime-local" name="published_at" id="published_at" value="<?= htmlspecialchars(str_replace(' ', 'T', $article->published_at)); ?>">
    </div>
  <div class="">
    <button>Save</button>
  </div>

</form>
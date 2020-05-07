<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article) : ?>
    <h2><a href="/articles/<?= $article->GetId() ?>"><?= $article->GetName() ?></a></h2>
    <p><?= $article->GetText() ?></p>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
<!--<h1>Список новостей по категории --><?//=$category?><!--</h1>-->
<br>
<?php foreach($categoryNews as $newsItem): ?>
    <div>
        <h5>Категория: <a href="<?=route('news.category', ['category' => $newsItem['category']['id']])?>"><?=$newsItem['category']['category']?></a></h5>
        <strong><a href="<?=route('news.show', ['id' => $newsItem['id']])?>"><?=$newsItem['title']?></a></strong>
        <p><?=$newsItem['description']?></p>
        <em>Автор: <?=$newsItem['author']?></em>
        <hr>
    </div>
<?php endforeach; ?>


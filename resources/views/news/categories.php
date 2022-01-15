<h1>Список категорий новостей</h1>
<br>
<?php foreach ($categories as $categoryItem) : ?>
    <div>
        <strong><a href="<?=route('news.category', ['category' => $categoryItem['id']])?>"><?=$categoryItem['category']?></a></strong>
    </div>
<?php endforeach; ?>

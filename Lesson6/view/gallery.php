
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery" style = "display: flex">
        <?php foreach ($images as $item):?>
        <div style = "padding: 5px">
            <a rel="gallery" class="photo" href=/img/<?=$item['id']?>><img src="<?=IMG_SML_DIR . $item[fileName]?>" width="150" height="100" /></a>
            <p><?=$item['counter']?></p>
        </div>
        <?php endforeach;?>
    </div>
</div>
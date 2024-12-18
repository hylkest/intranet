<body>
    <h1 style="text-align: center;">Loonstroken</h1>
<div class="container-articles"> 
    <form method="post">
        <input type="hidden" name="action" value="update">
    </form>

    <form method="post">
        <input type="hidden" name="action" value="add">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="content" placeholder="Content">
        <input type="text" name="image" placeholder="Image">
        <input type="submit" class="btn btn-primary" value="Add">
    </form>
</div>

<div class="container container-articles"> 
<?php
/** @var \src\Model\Article $article*/
foreach ($urlData as $article): ?>
    <div class="article">   
        <h4><?php echo $article->getTitle(); ?> - <?php echo $article->getTimestamp(); ?></h4>
        <?php if($article->getImage() && file_exists("src/View/".$article->getImage())): ?>
        <img src="<?php echo "src/View/" . $article->getImage(); ?>"/>
        <?php endif; ?>
        <p><?php echo $article->getContent(); ?></p>
    </div>


<?php endforeach; ?>
        </div>
</body>
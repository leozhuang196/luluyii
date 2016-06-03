<?php 
use modules\shop\models\Category;
?>
<nav class="navbar navbar-default">
	<ul class="nav nav-pills">
		<li><a href="#">全部商品分类</a></li>   
		<?php $categories = Category::getCategoriesByLevel('2');foreach ($categories as $category):?>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $category->name?><b class="caret"></b></a>
			<ul class="dropdown-menu">
				<?php $children = $category->children(1)->all();foreach ($children as $child):?>
				<li><a href="#"><?= $child->name?></a></li>
				<?php endforeach;?>
			</ul>
		</li>
		<?php endforeach;?>
	</ul>
</nav>
<div id="myCarousel" class="carousel slide">
	 <!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
        <div class="active item"><img src="/01.jpg" alt="HTML5 logo" width='1920' height='380'/></div>
        <div class="item"><img src="/02.jpg" alt="JS logo" width='1920' height='380' /></div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>

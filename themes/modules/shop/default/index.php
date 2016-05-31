<?php 
use modules\shop\models\Category;
?>
<nav class="navbar navbar-inverse">
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

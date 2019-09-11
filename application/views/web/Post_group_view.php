<section class="body">
	<header class="page-header container">
		<div id="path">
			<div class="container">
				<div class="box-breadcrumb">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
						<li><a href="<?php echo base_url().'tin-tuc/'.$result['code'] ?>" title="<?= $result['name'] ?>"><?= $result['name'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	
	<section id="page-body" class="container page-post-detail">
		<h1 class="block-title"><?= $result['name'] ?></h1>
		<div class="row">
			<div class="blog-post col-md-9">
				<?php
				foreach ($listPost as $key => $item) {
					$link = base_url().'tin-tuc/'.$item['code'].'.html';
					$img = '<img src="'.base_url().$item['thumb'].'" alt="'.$item['title'].'" class="img-responsive">';
					if($key%2 !=0){
						echo '<div class="post row">
						<figure>
						<div class="col-sm-4">
						<a href="'.$link.'" title="'.$item['title'].'">'.$img.'</a>
						</div>
						<figcaption class="col-sm-8">
						<a href="'.$link.'" title="'.$item['title'].'" class="post-title">'.$item['title'].'</a>
						<div class="post-intro">'.$item['intro'].' [...]'.'</div>
						<a href="'.$link.'" title="'.$item['title'].'" class="btn btn-link pull-right">Chi tiết...</a>
						</figcaption>
						</figure>
						</div>';
					}else{
						echo '<div class="post row">
						<figure>
						<div class="col-sm-4 col-md-push-8">
						<a href="'.$link.'" title="'.$item['title'].'">'.$img.'</a>
						</div>
						<figcaption class="col-sm-8 col-md-pull-4">
						<a href="'.$link.'" title="'.$item['title'].'" class="post-title">'.$item['title'].'</a>
						<div class="post-intro">'.$item['intro'].' [...]'.'</div>
						<a href="'.$link.'" title="'.$item['title'].'" class="btn btn-link pull-right">Chi tiết...</a>
						</figcaption>
						</figure>
						</div>';
					}
				}
				?>
				<div class="clearfix"></div>
				<?php if (isset($links)) { ?>
				<?php echo $links ?>
				<?php } ?>
			</div>
			<aside class="col-md-3">
				<aside class="box-module news">
					<div class="title">Tin mới nhất</div>
					<?php
					foreach ($listHot as $key => $item) {
						$link = base_url().'tin-tuc/'.$item['code'].'.html';
						$date = date('H:i d/m/Y', strtotime($item['cdate']));
						if($key==0){
							echo '<article class="item item-first">
							<a href="'.$link.'" title="'.$item['title'].'" class="box-thumb">
							<figure>
							<img src="'.base_url().$item['thumb'].'" class="thumb img-responsive">
							</figure>
							</a>
							<p class="article-title"><a href="'.$link.'" title="'.$item['title'].'">'.$item['title'].'</a></p>
							<div class="article-meta">
							<span class="article-publish"><i class="fa fa-calendar" aria-hidden="true"></i>'.$date.'</span>
							<div class="article-desc">'.$item['intro'].'</div>
							</div>
							</article>';
						}else{
							echo '<article class="item">
							<a href="'.$link.'" title="'.$item['title'].'" class="box-thumb">
							<figure>
							<img src="'.base_url().$item['thumb'].'" class="thumb img-responsive">
							</figure>
							</a>
							<p class="article-title"><a href="'.$link.'" title="'.$item['title'].'">'.$item['title'].'</a></p>
							<div class="article-meta">
							<span class="article-publish"><i class="fa fa-calendar" aria-hidden="true"></i>'.$date.'</span>
							</div>
							</article>';
						}
					}
					?>
				</aside>
			</aside>
		</div>
	</section>
</section>

<section class="body">
	<header class="page-header container">
		<div id="path">
			<div class="container">
				<div class="box-breadcrumb">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
						<li><a href="<?php echo base_url().'tin-tuc/'.$result['category']['code'] ?>" title="<?= $result['category']['name'] ?>"><?= $result['category']['name'] ?></a></li>
						<li><a href="<?php echo base_url().'tin-tuc/'.$result['code'].'.html' ?>" title="<?= $result['title'] ?>"><?= $result['title'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<section id="page-body" class="container page-post-detail">
		<h1 class="block-title"><?= $result['title'] ?></h1>
		<div class="row">
			<article class="col-md-9">
				<div class="post-detail">
					<div class="p-intro"><?= $result['intro'] ?></div>
					<?php
					if(count($result['related'])>0){
						echo '<div class="post-related">
						<ul class="list-related-news">';
						foreach ($result['related'] as $item) {
							echo'<li>
							<i class="fa fa-circle" aria-hidden="true"></i>
							<a href="'.base_url().'tin-tuc/'.$item['code'].'.html" title="'.$item['title'].'" class="name">'.$item['title'].'</a>
							</li>';
						}
						echo '</ul>
						</div>';
					}
					?>
					<div class="fulltext"><?= $result['fulltext'] ?></div>
				</div>
			</article>
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
		<aside class="box-relatedcontent">
			<h3 class="box-title">Bài viết cùng chuyên mục</h3>
			<div class="row">
				<?php
				foreach ($posts_same_group as $item) {
					echo '
					<div class="col-md-3 item">
					<figure>
					<a href="'.base_url().'tin-tuc/'.$item['code'].'.html" title="'.$item['title'].'" class="box-thumb">
					<img src="'.base_url().$item['thumb'].'" atl="'.$item['title'].'" class="thumb img-responsive">
					</a>
					<figcaption>
					<p class="article-title"><a href="'.base_url().'tin-tuc/'.$item['code'].'.html" title="'.$item['title'].'">'.$item['title'].'</a></p>
					<div class="p-intro lab-hide">'.$item['intro'].'</div>
					</figcaption>
					</figure>
					</div>';
				}
				?>
			</div>
		</aside>
	</section>
</section>

<section class="body">
	<header class="page-header">
		<div id="path">
			<div class="container">
				<div class="box-breadcrumb">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
						<li>Tìm kiếm với từ khóa <span class="red title"><?= $q ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<section id="page-body" class="container page-search page-post-detail">
		<div class="row">
			<div class="col-md-12"><h1 class="block-title">Tìm kiếm với từ khóa <span class="red"><?= $q ?></span></h1></div>
			<div class="box-product col-md-9">
				<?php
				foreach ($result as $key => $item) {
					$link = base_url().'san-pham/'.$item['code'].'/'.$item['pro_code'];
					$img = '<img src="'.base_url().$item['thumb'].'" alt="'.$item['name'].'" class="img-responsive">';
					?>
					<div class="col-md-3 col-sm-3 col-xs-6 product">
						<figure>
							<a href="<?= $link ?>" title="<?= $item['name'] ?>">
								<img src="<?= base_url().$item['thumb'] ?>" class="img-responsive thumb" alt="<?= $item['name'] ?>">
							</a>
							<figcaption>
								<h3 class="name"><a href="<?= $link ?>" title="<?= $item['name'] ?>"><?= $item['name'] ?></a></h3>
								<div class="price"> <?= number_format($item['start_price']) ?>₫</div>
								<!-- <div><span class="oldprice">240.000₫</span> <span class="price-percent">(-25%)</span></div> -->
							</figcaption>
						</figure>
					</div>
					<?php
				}
				?>
			</div>
			<aside class="col-md-3">
				<aside class="box-module news">
					<div class="title">Tin nổi bật</div>
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

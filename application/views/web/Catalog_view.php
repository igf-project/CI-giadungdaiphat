<section class="body">
	<header class="page-header container">
		<div id="path">
			<div class="container">
				<div class="box-breadcrumb">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
						<li><a href="<?php echo base_url().'san-pham/'.$result['code'] ?>" title="<?= $result['name'] ?>"><?= $result['name'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<section id="page-body" class="container page-post-detail">
		<h1 class="block-title"><?= $result['name'] ?></h1>
		<div class="row">
			<div class="blog-product col-md-9">
				<div class="orderby prevent">
					<div class="ordertype">
						<span>Xếp theo:</span> 
						<a href="#" data-id="1" data-text="SP bán chạy"> 
							<i class="iconcate-radio"></i>Bán chạy 
						</a> 
						<a href="#" data-id="3" data-text="Giá cao đến thấp"> 
							<i class="iconcate-radio"></i>Giá cao đến thấp 
						</a> 
						<a href="#" data-id="2" data-text="Giá thấp đến cao" class="check"> 
							<i class="iconcate-radio"></i>Giá thấp đến cao 
						</a>
					</div>
				</div>
				
				<div class="row box-product">
					<?php
					foreach ($listProduct as $key => $item) {
						$link = base_url().'san-pham/'.$item['code'].'/'.$item['pro_code'];
						$img = '<img src="'.base_url().$item['thumb'].'" alt="'.$item['name'].'" class="img-responsive">';
						?>
						<div class="col-md-3 product">
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
				<div class="clearfix"></div>
				<?php if (isset($links)) { ?>
				<?php echo $links ?>
				<?php } ?>
			</div>
			<aside class="col-md-3">
				<aside class="fillter">
					<div class="filter-sidebar">
						<div class="title">
							<span>Nhóm sản phẩm</span>
						</div>
						<ul>
							<?php
							foreach ($list_child_catalog as $item) {
								$link = base_url().'san-pham/'.$result['code'].'?cata='.$item['id'];
								echo '<li><i class="fa fa-circle" aria-hidden="true"></i><a href="'.$link.'" title="'.$item['name'].'">'.$item['name'].'</a></li>';
							}
							?>
						</ul>
					</div>
				</aside>
			</aside>
		</div>
	</section>
</section>

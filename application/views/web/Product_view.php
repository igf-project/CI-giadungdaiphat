<section class="body">
	<header class="page-header container">
		<div id="path">
			<div class="container">
				<div class="box-breadcrumb">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
						<li><?= $group_product['name'] ?></li>
						<li><a href="<?php echo base_url().'san-pham/'.$result['code'].'/'.$result['pro_code'] ?>" title="<?= $result['name'] ?>"><?= $result['name'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<section id="page-body" class="container page-product-detail">
		<div class="row">
			<?php
			$result['images'] = json_decode($result['images']);
			?>
			<aside class="col-sm-4">
				<div class="img-detail">
					<a href='<?= base_url().$result['images'][0] ?>' class='MagicZoom' id='Zoomer' rel='selectors-change: mouseover; selectors-effect: fade' title='"<?= $result['name'] ?>"'>
						<img align='left' src='<?= base_url().$result['images'][0] ?>' class='imgZoom img-responsive' alt="<?= $result['name'] ?>"/>
					</a>
				</div>
				<div class="products-slider-detail">
					<div id="owl-demo" class="owl-carousel owl-theme">
						<?php
						foreach ($result['images'] as $key => $value) {
							if($value != ''){
								echo '<a href="'.base_url().$value.'" rev="'.base_url().$value.'" rel="zoom-id:Zoomer"><img src="'.base_url().$value.'" data-zoom-image="'.$value.'" alt="" class="img-thumbnail"></a>';
							}
						}
						?>
					</div>
				</div>
			</aside>
			<article class="col-sm-8">
				<h1 class="block-title"><?= $result['name'] ?></h1>
				<table class="table table-detail">
					<tr>
						<td>Giá</td>
						<td>
							<div class="price">
								<?= number_format($result['start_price']).'<small style="color: #333; font-weight: 500;">₫</small>' ?>
							</div>
						</td>
					</tr>
					<tr>
						<td>Mã sản phẩm</td>
						<td>
							<div class="pro_code"><?= $result['pro_code'] ?></div>
						</td>
					</tr>
					<tr>
						<td>Số lượng</td>
						<td>
							<div class="input-qty">
								<input type="text" id="sl_number" value="1" class="form-control text-center" style="display: block;">
							</div>
						</td>
					</tr>
					<tr class="">
						<td>
							<button class="btn btn-theme btn_addCart" data-id="<?= $result['id'] ?>" data-pro-code="<?= $result['pro_code'] ?>" type="button"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
						</td>
					</tr>
				</table>
				<div class="visible-xs">
					<p class="text-center"><button class="btn btn-theme btn_addCart" data-id="<?= $result['id'] ?>" data-pro-code="<?= $result['pro_code'] ?>" type="button"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button></p>
				</div>
				<div class="product-intro">
					<p class="p-intro"><?= $result['intro'] ?></p>
				</div>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Thông tin sản phẩm</a>
					</li>
				</ul>
				<div class="tab-content tab-content-detail">
					<!-- Description Tab Content -->
					<div role="tabpanel" class="tab-pane active" id="desc">
						<div class="well">
							<?= $result['fulltext'] ?>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="clearfix"></div>
		<aside class="box-relatedProduct">
			<h3 class="box-title"><span>Sản phẩm cùng nhóm</span></h3>
			<div class="row">
				<?php
				foreach ($product_same_group as $item) {
					echo '
					<div class="col-md-2 col-sm-4 col-xs-3 item">
					<figure>
					<a href="'.base_url().'san-pham/'.$item['code'].'/'.$item['pro_code'].'" title="'.$item['name'].'" class="box-thumb">
					<img src="'.base_url().$item['thumb'].'" atl="'.$item['name'].'" class="thumb img-responsive">
					</a>
					<figcaption>
					<h3 class="article-title"><a href="'.base_url().'tin-tuc/'.$item['code'].'.html" title="'.$item['name'].'">'.$item['name'].'</a></h3>
					<span class="price">'.number_format($item['start_price']).'<small style="color:#333">₫</small></span>
					</figcaption>
					</figure>
					</div>';
				}
				?>
			</div>
		</aside>
	</section>
</section>
<script type="text/javascript">
	$("#sl_number").TouchSpin({
		verticalbuttons: true,
		prefix: 'Sl'
	});
</script>

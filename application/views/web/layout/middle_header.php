<!-- Header -->
<header class="header">
	<!-- Middle Header -->
	<div class="middle-header" data-spy="affix" data-offset-top="180">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-2">
					<a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" class="logo img-responsive" title="trang chủ"></a>
				</div>
				<div class="col-sm-8 col-md-6 search-box m-t-2">
					<form method="GET" action="<?= base_url() ?>tim-kiem">
						<div class="input-group">
							<input type="text" value="<?php if(isset($q)) echo $q ?>" class="form-control search-input" name="q" aria-label="Search here..." placeholder="Sản phẩm muốn tìm..." required="">
							<div class="input-group-btn">
								<select id="selectpicker" class="selectpicker hidden-xs" data-width="150px" data-style="btn-default" name="cata">
									<option value="">Tất cả</option>
									<?php
									foreach ($catalog as $key => $value) {
										if(isset($cata) && $value['id'] == $cata){
											echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
										}else{
											echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
										}
									}
									?>
								</select>
								<button id="btn-search" type="submit" class="btn btn-default btn-search"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-2 col-md-3 cart-btn hidden-xs m-t-2">
					<a href="<?= base_url()?>gio-hang" class="btn btn-theme">
						<i class="fa fa-shopping-cart"></i> <span id="count_cart"><?php if(isset($_SESSION['CART'])) echo count($_SESSION['CART']); else echo '0'; ?></span> <span class="caret"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Middle Header -->


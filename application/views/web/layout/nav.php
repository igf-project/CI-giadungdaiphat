<!-- Navigation Bar -->
<?php
$eol = PHP_EOL;
?>
<nav class="navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#wrapper-mainmenu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?= base_url()?>gio-hang" class="btn btn-default btn-cart-xs btn-theme visible-xs pull-right">
				<i class="fa fa-shopping-cart"></i> <span id="count_cart"><?php if(isset($_SESSION['CART'])) echo count($_SESSION['CART']); else echo '0'; ?></span> <span class="caret"></span>
			</a>
		</div>
		<div id="wrapper-mainmenu" class="navbar-collapse collapse">
			<ul class="nav navbar-nav main-menu">
				<?php
				foreach ($menu as $key => $value) {
					if($value['code'] == 'san-pham'){
						echo '<li class="dropdown mega-menu">';
						echo '<a href="'.$value['link'].'" title="'.$value['title'].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$value['title'].'<span class="caret"></span></a>';
						echo '<ul class="dropdown-menu">';
						echo '<li>';
						echo '<div class="mega-menu-content">
						<div class="row">
						<div class="col-sm-3">
						<ul id="list-unstyled" class="list-unstyled">';
						foreach ($catalog as $item) {
							echo '<li data-id="'.$item['id'].'"><a href="'.$item['url'].'" title="'.$item['name'].'"> '.$item['name'].'</a></li>';
						}
						echo '</ul>
						</div>'.$eol;
						foreach ($catalog as $index => $item) {
							if($index==0){
								echo '<div class="col-sm-9 box-show-hot box-show-hot-'.$item['id'].' show">';
							}else{
								echo '<div class="col-sm-9 box-show-hot box-show-hot-'.$item['id'].'">';
							}
							echo '<div class="row">';
							foreach ($item['product'] as $key => $value) {
								$link = base_url()."san-pham/".$value["code"]."/".$value["pro_code"];
								
								if($key==0){
									echo '<div class="col-sm-4 hot-'.$item['id'].'">
									<div class="thumbnail blog-list">
									<a href="'.$link.'" title="'.$value['name'].'" class="box-thumb big"><img src="'.base_url().$value['thumb'].'" alt="'.$value['name'].'" class="img-responsive thumb"></a>
									<div class="caption">
									<h4>'.$value['name'].'</h4>
									<p class="visible-lg">'.$value['intro'].'</p>
									<div class="text-right"><a href="'.$link.'" class="btn btn-theme btn-sm" title="'.$value['name'].'"><i class="fa fa-long-arrow-right"></i> Xem thêm...</a></div>
									</div>
									</div>
									</div>'.$eol;
								}else if($key==1){
									echo '<div class="col-sm-4 hot-'.$item['id'].'">
									<div class="row">
									<div class="col-xs-6 col-sm-12">
									<a href="'.$link.'" class="thumbnail small" title="'.$value['name'].'"><img src="'.base_url().$value['thumb'].'" alt="'.$value['name'].'" class="img-responsive"></a>
									</div>
									<div class="col-xs-6 col-sm-12">
									<a href="'.$link.'" class="thumbnail small" title="'.$value['name'].'"><img src="'.base_url().$value['thumb'].'" alt="'.$value['name'].'" class="img-responsive"></a>
									</div>
									</div>
									</div>'.$eol;
								}else if($key==3){
									echo '<div class="col-sm-4 hot-'.$item['id'].'">
									<div class="thumbnail blog-list">
									<a href="'.$link.'" title="'.$value['name'].'" class="box-thumb big"><img src="'.base_url().$value['thumb'].'" alt="'.$value['name'].'" class="img-responsive thumb"></a>
									<div class="caption">
									<h4>'.$value['name'].'</h4>
									<p class="visible-lg">'.$value['intro'].'</p>
									<div class="text-right"><a href="'.$link.'" class="btn btn-theme btn-sm" title="'.$value['name'].'"><i class="fa fa-long-arrow-right"></i> Xem thêm...</a></div>
									</div>
									</div>
									</div>'.$eol;
								}
							}
							echo '</div></div>';
						}
						
						echo '<li>';
						echo '</ul>';
						echo '</li>';
					}else{
						echo '<li>';
						if(count($value['child']) > 0){
							echo '<a href="'.$value['url'].'">'.$value['title'].'<span class="caret"></span></a>';
							echo '<ul class="sub-menu">';
							foreach ($value['child'] as $child) {
								echo '<li><a href="'.$child['url'].'" title="'.$child['title'].'">'.$child['title'].'</a></li>';
							}
							
							echo '</ul>';
						}else{
							echo '<a href="'.$value['url'].'">'.$value['title'].'</a>';
						}
						echo '</li>';
					}
				}
				?>
			</ul>
		</div>
	</div>
</nav>
<!-- End Navigation Bar -->
</header>
<!-- End Header -->

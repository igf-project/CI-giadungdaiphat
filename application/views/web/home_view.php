<!-- Main Content -->
<section class="body">
	<section class="nav-catalog">
		<div class="container">
			<?php
			// echo '<div style="display:none">';
			// var_dump($catalog);
			// echo '</div>';
			foreach ($catalog as $item) {
				$link = base_url().'san-pham/'.$item['code'];
				echo '<a href="'.$link.'" title="'.$item['name'].'" class="item">
				<figure>
				<img src="'.base_url().$item['image'].'" alt="'.$item['name'].'" class="img-responsive">
				<figcaption><h3>'.$item['name'].'</h3></figcaption>
				</figure>
				</a>';
			}
			?>
		</div>
	</section>
	<section class="container">
		<ul class="homeproduct appliance">
			<?php
			foreach ($products as $key => $value) {
				$link = base_url().'san-pham/'.$value['code'].'/'.$value['pro_code'];
				echo '<li>
				<a href="'.$link.'" title="'.$value['name'].'">
				<figure>
				<img src="'.base_url().$value['thumb'].'" alt="'.$value['name'].'">
				<figcaption>
				<h3>'.$value['name'].'</h3>
				<strong>'.number_format($value['start_price']).'₫</strong>
				<div class="promotion">';
				//<div class="title">Khuyến mãi:</div>
				echo '<span>'.$value['intro'].'</span>
				</div>
				<p></p>
				</figcaption>
				</figure>
				</a>
				</li>';
			}
			?>
		</ul>
	</section>
	<section class="nav-catalog">
		<div class="container">
			<?php
			foreach ($catalog as $item) {
				$link = base_url().'san-pham/'.$item['code'];
				echo '<a href="'.$link.'" title="'.$item['name'].'" class="item">
				<figure>
				<img src="'.base_url().$item['image'].'" alt="'.$item['name'].'" class="img-responsive">
				<figcaption><h3>'.$item['name'].'</h3></figcaption>
				</figure>
				</a>';
			}
			?>
		</div>
	</section>
</section>
<br>
<!-- End Main Content -->
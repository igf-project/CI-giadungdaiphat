<section class="body">
	<header class="page-header container">
		<div id="path">
			<div class="container">
				<div class="box-breadcrumb">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
						<li><a href="<?php echo base_url().'gio-hang'?>" title="Giỏ hàng">Giỏ hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<section id="page-body" class="container page-order">
		<div class="row list-order">
			<?php
			if (isset($success_message)) {
				echo $success_message;
				echo '<div style="margin-bottom:20px;">Chúc mừng bạn đã đặt hàng thành công. <span style="font-style: italic;"><b style="color: red; font-weight: 500">Gia dụng Đại Phát</b> sẽ tiếp nhận thông tin và liên hệ tới bạn trong vòng 1 ngày làm việc. Xin cảm ơn!</span></div>';
			}
			if (isset($error_message)) {
				echo $error_message;
			}
			?>
			<div class="text-center">
				<a href="<?= base_url() ?>" class="btn btn-success" title="Trang chủ">Về trang chủ</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
</section>

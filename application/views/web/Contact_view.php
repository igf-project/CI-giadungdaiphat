<section class="body">
	<header class="page-header container">
		<div id="path">
			<div class="box-breadcrumb">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>" title="Trang chủ"><i class="fa fa-home" aria-hidden="true" style="font-size:18px"></i></a></li>
					<li><a href="<?php echo base_url().'lien-he' ?>" title="Liên hệ">Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</header>
	<section id="page-body" class="container page-contact">
		<h1 class="block-title">Liên hệ</h1>
		<div class="row">
			<div class="box-contact">
				<div class="col-md-3 col-sm-4 box-left">
					<ul>
						<li>
							<i class="fa fa-home" aria-hidden="true"></i><?= $config['title'] ?>
							<ul>
								<li><?= $config['address'] ?><br></li>
							</ul>
						</li>
						<li>
							<i class="fa fa-phone-square" aria-hidden="true"></i>
							Tel : <?= $config['phone'] ?><br>
						</li>
						<li><i class="fa fa-envelope-square" aria-hidden="true"></i><?= $config['email'] ?></li>
					</ul>
				</div>
				<div class="col-sm-8 col-md-9 box-right">
					<div class="title">Liên hệ</div>
					<p>Cám ơn Quý Khách hàng đã quan tâm đến dịch vụ cho vay tín dụng của <span class="red">Vaytien24.vn</span>. Vui lòng gửi thông tin chi tiết để chúng tôi có thể sắp xếp cuộc hẹn. Tư vấn viên của chúng tôi sẽ liên hệ lại cho bạn để xác nhận .</p>
					<form class="form-horizontal frm-contact" action="<?= base_url() ?>lien-he/submit_contact" method="post" role="form">
						<center><strong></strong></center>
						<div class="row">
							<div class="col-sm-6 left">
								<span>Tên <font color="red">*</font></span>
								<input type="text" id="contact_sur_name" class="form-control" name="contact_sur_name" required>
							</div>
							<div class="col-sm-6 right">
								<span>Email <font color="red">*</font></span>
								<input type="text" id="contact_email" class="form-control" name="contact_email" required>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 left">
								<span>Tiêu đề <font color="red">*</font></span>
								<input type="text" id="contact_subject" class="form-control" name="contact_subject" required>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 left">
								<span>Nội dung <font color="red">*</font></span>
								<textarea class="form-control" name="contact_content" rows="5" required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 left">
								<button id="cmd_send_contact" class="btn btn-primary" name="cmd_send_contact">Gửi</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</section>

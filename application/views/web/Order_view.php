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
			<div class="box-product col-md-9">
				<h1 class="block-title">Giỏ hàng</h1>
				<form method="post" action="<?= base_url().'order/update_quantity'?>">
					<table class="table table-order">
						<tr>
							<th>Ảnh</th>
							<th>Mã</th>
							<th>Tên</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th></th>
						</tr>
						<?php
						$total = $amount = 0;
						if(isset($_SESSION['CART']) && count($_SESSION['CART']) > 0){
							$n = count($_SESSION['CART']);
							for ($i=0; $i < $n; $i++) { 
								$name = $_SESSION['CART'][$i]['name'];
								$pro_code = $_SESSION['CART'][$i]['pro_code'];
								$thumb = base_url().$_SESSION['CART'][$i]['thumb'];
								$link = base_url().'san-pham/'.$_SESSION['CART'][$i]['code'].'/'.$pro_code;

								/*Tính tổng tiền*/
								$amount = $_SESSION['CART'][$i]['sl'] * $_SESSION['CART'][$i]['start_price'];
								$total += $amount;

								echo '<tr>
								<td><img src="'.$thumb.'" alt="'.$name.'" class="img-responsive"></td>
								<td><b>'.$pro_code.'</b></td>
								<td>'.$name.'</td>
								<td><span class="price">'.number_format($_SESSION['CART'][$i]['start_price']).'</span>₫</td>
								<td><input type="number" class="btn-quantity" min=0 name="quantity[]" value="'.$_SESSION['CART'][$i]['sl'].'"></td>
								<td class="tbl_actions"><a href="'.base_url().'order/delete/'.$_SESSION['CART'][$i]['id'].'" title="Xóa" onclick="return confirm(\'Bạn có chắc muốn xóa ?\')"><i class="fa fa-trash red" aria-hidden="true"></i>Delete</a></td>
								</tr>';
							}
						}
						?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Tổng tiền : <span class="price"><?= number_format($total).'₫' ?></span></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td colspan="2" class="text-right">
								<input type="submit" name="update" class="btn btn-primary" value="Cập nhật giỏ hàng">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-md-3" style="background-color: #f5f5f5">
				<h2>Thông tin khách hàng</h2>
				<small>(Các mục có dấu <font color="red">*</font> là thông tin bắt buộc)</small>
				<form method="post" action="<?= base_url().'order/addnew'?>">
					<input type="hidden" name="txt_totalmoney" value="<?= $total ?>">
					<div class="form-group">
						<label>Họ</label><font color="red">*</font>
						<input type="text" name="txt_lastname" class="form-control" placeholder="Họ đệm của bạn" required>
					</div>
					<div class="form-group">
						<label>Tên</label><font color="red">*</font>
						<input type="text" name="txt_firstname" class="form-control" placeholder="Tên của bạn" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="txt_email" class="form-control" placeholder="Email (nếu có)">
					</div>
					<div class="form-group">
						<label>SĐT</label><font color="red">*</font>
						<input type="tel" name="txt_phone" class="form-control" placeholder="Số điện thoại">
					</div>
					<div class="form-group">
						<label>Địa chỉ</label><font color="red">*</font>
						<textarea name="txt_address" class="form-control" placeholder="Địa chỉ"></textarea>
					</div>
					<div class="form-group text-center">
						<input type="submit" name="submit_checkout" class="btn btn-primary" value="Gửi thông tin">
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
</section>

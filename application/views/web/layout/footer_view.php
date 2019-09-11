<!-- Footer -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 item">
				<a href="<?= $config['facebook'] ?>" target="_blank" style="display: block;">
					<img src="<?php echo base_url();?>assets/images/fanpage-fb.jpg" class="img-responsive">
				</a>
			</div>
			<div class="col-md-4 col-sm-6 right item">
				<div class="title"><span>THÔNG TIN LIÊN HỆ</span></div>
				<div class="content">
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i><?= $config['name'] ?></li>
						<li><i class="fa fa-share" aria-hidden="true"></i></i><?= $config['email'] ?></li>
					</ul>
					<address><i class="fa fa-map-marker" aria-hidden="true"></i><?= $config['address'] ?></address>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 left item">
				<div class="title"><span>ĐĂNG KÝ NHẬN TIN</span></div>
				<div class="registerEmail">
					<div id="registerEmail_result"></div>
					<form class="form-inline frm-mail" onsubmit="return check_subscribe();" name="frm-register-mail" method="post" action="<?php echo base_url().'index.php/home/subscribe'?>">
						<div class="form-group">
							<div class="input-group">
								<input type="text" name="register_email" class="form-control" id="exampleInputAmount" placeholder="Email của bạn" required>
								<div class="input-group-addon">
									<input type="submit" class="btn btn-primary" value="Gửi mail">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="box-social">
					<ul class="social-icons">
						<li><a class="rss" data-original-title="rss" href="javascript:void(0);"></a></li>
						<li><a class="facebook" target="_blank" data-original-title="facebook" href="<?= $config['facebook'] ?>"></a></li>
						<li><a class="twitter" data-original-title="twitter" href="javascript:void(0);"></a></li>
						<li><a class="googleplus" target="_blank" data-original-title="googleplus" href="<?= $config['gplus'] ?>"></a></li>
						<li><a class="youtube" target="_blank" data-original-title="youtube" href="<?= $config['youtube'] ?>"></a></li>
						<li><a class="vimeo" data-original-title="vimeo" href="javascript:void(0);"></a></li>
						<li><a class="skype" data-original-title="skype" href="javascript:void(0);"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom">
		© Copyright 2017. Made by Hiep Crab 
	</div>
</footer>
<!-- End Footer -->
<div id="back-top" style="display: block;">
	<a href="#" class="top" style="display: block;"><i class="fa fa-arrow-up fa-lg"></i></a>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		MagicZoom.options = {
			'selectors-effect': "false",
			'zoom-width' : 320,
			'zoom-height' : 320
		};
		
		var w = window.innerWidth;
		if(w >= 768){
			$('.dropdown.mega-menu').hover(function(){
				$(this).addClass('open');
			},function(){
				$(this).removeClass('open');
			});
		}
		

		$('#list-unstyled>li').hover(function(){
			var data_id = $(this).attr("data-id");
			$('#list-unstyled>li').removeClass('active');
			$(this).addClass('active');
			$('.box-show-hot').removeClass('show');
			$('.box-show-hot-'+data_id).addClass('show');
		});

		$('#owl-demo .img-thumbnail').click(function(){
			var url = $(this).attr("src");
			$('#Zoomer .imgZoom').attr("src", url);
			$('#Zoomer').attr("href", url);
		})

		/* Slide image in page product detail*/
		var owl = $("#owl-demo");
		owl.owlCarousel({
			dots: false,
			nav: true,
			navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsive:{
				0:{
					items:4,
					margin:5
				},
				768:{
					items:3,
					margin:5
				},
				1200:{
					items:4,
					margin:5
				}
			}
		});

		/* Add cart */
		$('.btn_addCart').click(function(){
			var id = $(this).attr("data-id");
			var pro_code = $(this).attr("data-pro-code");
			var quantity = $('#sl_number').val();
			$.ajax({
				type : 'POST',
				data : {'id' : id, 'pro_code' : pro_code, 'quantity' : quantity},
				url : '<?php echo base_url() ?>Product/addCart',
				success : function(result){
					$('#count_cart').text(result);
					alert("Thêm giỏ hàng thành công");
				}
			})
		})
	})

	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 400) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

	var swiper = new Swiper('#slide-main .swiper-container', {
		pagination: '#slide-main .swiper-pagination',
		nextButton: '#slide-main .swiper-button-next',
		prevButton: '#slide-main .swiper-button-prev',
		paginationClickable: true,
		spaceBetween: 0,
		centeredSlides: true,
			autoplay: 4000,
			loop:true,
			autoplayDisableOnInteraction: false
		});

	function check_subscribe(){
		var email 		= 	$('#exampleInputAmount').val();
		reg1			=	/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
		testmail		=	reg1.test(email);
		if(!testmail){
			$('#registerEmail_result').html('<font color="red">Địa chỉ Email không hợp lệ</font>');
			return false;
		}else{
			return true;
		}
	}
</script>
</body>
</html>

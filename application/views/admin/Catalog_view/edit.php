<?php
$base_url = base_url().'admin/Catalog/';

if($result['image']==''){
    $thumb = $this->config->item('THUMB_DEFAULT');
}else{
    $thumb = base_url().$result['image'];
}
?>
<div id="path">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>admin">Admin</a></li>
        <li><a href="<?php echo $base_url ?>">Nhóm sản phẩm</a></li>
        <li class="active">Sửa nhóm sản phẩm</li>
    </ol>
</div>
<div id="action">
    <div class="box-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active">
                <a href="#info" role="tab" data-toggle="tab">
                    Thông tin
                </a>
            </li>
            <li>
                <a href="#seo" role="tab" data-toggle="tab">
                    Seo
                </a>
            </li>
        </ul>
        <small>Các mục đánh dấu <font color="red">*</font> là thông tin bắt buộc</small><hr/>
        <form method="post" action="<?php echo $base_url ?>do_edit" enctype="multipart/form-data">
            <div class="tab-content">
                <input type="hidden" name="txtid" value="<?php echo $id;?>">
                <input type="hidden" name="parentOld" value="<?= $result['par_id'] ?>">
                <!-- Tab infomation -->
                <div class="tab-pane fade active in" id="info">
                    <div class="row">
                        <div class='form-group col-md-6'>
                            <label>Tên</label><font color="red">*</font>
                            <input name="txt_name" type="text" id="txt_name" size="45" value="<?php echo $result['name']?>" class='form-control' placeholder='Tên nhóm tin' required />
                        </div>
                        <div class='form-group col-sm-6 col-md-6'>
                            <label>Nhóm cha</label>
                            <select name="cbo_par" id="cbo_par" class="form-control">
                                <option value="">Chọn một nhóm</option>
                                <?php
                                foreach ($parent as $item) {
                                    if($item['id'] == $result['par_id']){
                                        echo '<option value="'.$item['id'].'" selected="selected">'.$item['name'].'</option>';
                                    }else{
                                        echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <font id='err-gmember' color="red"></font>
                            <div class="clearfix"></div>
                        </div>
                        <div class='form-group col-sm-6'>
                            <label class="control-label">Image<font color="red">*</font></label>
                            <input name="fileImg" type="file" id="file-thumb" size="45" class='form-control'/>
                            <input name="url_image" type="hidden" value="<?php echo $result['image'] ?>""/>
                            <div id="show-img">
                                <img class="img-display" src="<?php echo $thumb?>">
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <label>Trạng thái</label>
                            <div class="form-group">
                                <?php
                                if($result['isactive']==1){
                                    echo '<label class="radio-inline"><input name="optactive" type="radio" value="1" checked>Active</label>
                                    <label class="radio-inline"><input name="optactive" type="radio" value="0">Deactive</label>';
                                }else{
                                    echo '<label class="radio-inline"><input name="optactive" type="radio" value="1">Active</label>
                                    <label class="radio-inline"><input name="optactive" type="radio" value="0" checked>Deactive</label>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class='form-group col-sm-12'>
                            <label class="control-label">Mô tả</label>
                            <textarea name="txt_intro" id="txt_intro" rows="3" class='form-control' placeholder='Mô tả ngắn dưới 20 từ'/><?php echo $result['intro']?></textarea>
                            <script type="text/javascript">CKEDITOR.replace("txt_intro"); </script>
                        </div>
                    </div>
                </div>
                <!-- Tab Seo -->
                <div class="tab-pane fade" id="seo">
                    <div class='form-group'>
                        <label>Mô tả tiêu đề</label>
                        <input name="txt_metatitle" type="text" id="txt_metatitle" class='form-control' value="<?= $result['meta_title']?>" placeholder='' rows="1"/>
                    </div>
                    <div class='form-group'>
                        <label>Từ khóa</label>
                        <textarea class="form-control" name="txt_metakey" id="txt_metakey" rows="2"><?= $result['meta_key']?></textarea>
                    </div>
                    <div class='form-group'>
                        <label>Description</label>
                        <textarea class="form-control" name="txt_metadesc" id="txt_metadesc" rows="3"><?= $result['meta_desc']?></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <br/>
                <a href="<?php echo $base_url ?>" class="btn btn-default">Quay lại</a>
                <input type="submit" name="cmdsave" id="cmdsave"  class="btn btn-primary" value="Lưu thông tin">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("input#file-thumb").change(function(e) {
            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i];
                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $('#show-img').addClass('show-img');
                $('#show-img').html(img);
            }
        });
    });
</script>
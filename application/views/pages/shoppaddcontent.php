<?php
    $this->load->view('pages/head');
?>
    <!-- 编辑器使用的==配置文件 start -->
    <script type="text/javascript" src="<?php echo base_url()?>public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/plug/ue/ueditor.all.js"></script>
    <!--  编辑器使用的==配置文件 end -->
    <![endif]-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">商品管理----添加</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="panel panel-info">
                        <form action="#" class="form-horizontal" id="addcotentproducts">
                            <div class="control-group ">
                                <label class="control-label">产品名称：</label>
                                <div class="controls">
                                    <input type="text" id="productname" name="productname" class="span6"/>
                                    <span>必填</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">产品介绍：</label>
                                <div class="controls">
                                    <input type="text" id="introduced" name="introduced" class="span6"/>
                                    <span>必填</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">产品颜色</label>
                                <div class="controls">
                                    <input type="text" id="productprice" name="productprice" class="span6 "/>
                                    <span>必填</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">产品尺寸</label>
                                <div class="controls">
                                    <input type="text" id="productprice" name="productprice" class="span6 "/>
                                    <span>必填</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">图片</label>
                                <div class="controls">
                                    <button type="button" id="j_upload_img_btn" class="btn btn-info">多图上传</button>

                                    <ul id="upload_img_wrap"  name="product_img" style="border:1px solid #ccc"></ul>
                                    <!-- 传图片地址值用的 -->
                                    <input type="hidden" id="product_img" name="product_img" >

                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                    <ul id="uploadEditor">

                                    </ul>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">详情</label>
                                <div class="controls">
                                    <textarea name="detail" id="detail" class="span8"></textarea>
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-success" id="addcontent" >添加</button>
                                <button type="reset" class="btn">重置</button>
                            </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
        var ue = UE.getEditor('detail'); //detail是需要加载编辑器的id


        //==========================================================
        // 如何单独上传图片功能
        // 监听多图上传和上传附件组件的插入动作
        // 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
        var uploadEditor = UE.getEditor("uploadEditor", {
            isShow: false,
            focus: false,
            enableAutoSave: false,
            autoSyncData: false,
            autoFloatEnabled:false,
            wordCount: false,
            sourceEditor: null,
            scaleEnabled:true,
            toolbars: [["insertimage", "attachment"]]
        });
        uploadEditor.ready(function () {
            uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
        });

        // 自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
            var dialog = uploadEditor.getDialog("insertimage");
            dialog.title = '多图上传';
            dialog.render();
            dialog.open();
        };

        // 多图上传动作
        function _beforeInsertImage(t, result) {
            var imageHtml = '';
            var imgval = '';
            for(var i in result){
                imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                imgval +=','+ result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('product_img').value = imgval;
        }
    </script>
<?php
    $this->load->view('pages/foot');
?>
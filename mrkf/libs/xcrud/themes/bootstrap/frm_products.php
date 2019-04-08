<style type="text/css">
    ul.parent{
        direction: rtl;
        list-style-image: none;
        list-style: none;
        margin: 0;
        padding-right : 11px;
        list-style-position: outside;

    }
    ins{
        background-image : url('rtl.gif') ;
        background-repeat : no-repet; 
        text-decoration: none;
        display: inline-block;
        width: 15px;
        height: 15px;
    }
    .insRootOpen
    {    
        background-position: -72px 0px;
    }
    .insExpand{    
        background-position: -90px 0px;
    }
    .insRootClose ins{
        background-position: -54px 0px;
    }
    .insRootClose>li>ul
    {
        display: none;   
    }
    .insNoChild ins
    {
        background-position: -36px 0px;
    }
</style>
<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">محتوا</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="input-group">
                            <span class="input-group-addon">عنوان صفحه</span>
                            <?=$this->fields_output['product.title']['field'];?>
                        </div> 
                        
                    </div>
                    <div class="col-xs-3">
                        <div class="input-group">
                            <span class="input-group-addon">SKU</span>
                            <?=$this->fields_output['product.sku']['field'];?>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="input-group">
                            <span class="input-group-addon">کشور</span>
                            <?=$this->fields_output['product.madein']['field'];?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">&nbsp;&nbsp; عنوان سئو</span>
                            <?=$this->fields_output['product.seotitle']['field'];?>
                        </div>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-xs-12">
                        <?=$this->fields_output['product.info']['field'];?>
                    </div>
                </div>
                <div class="box-footer">
                </div>
            </div>
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">SEO</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
                    
                    <?= $this->fields_output['product.meta_description']['field'];?>
                    <hr> 
                    <?= $this->fields_output['product.lables']['field'];?>
                    <hr>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab">مشکلات</a></li>
                            <li><a href="#tab_2-2" data-toggle="tab">خوانایی</a></li>
                            <li><a href="#tab_3-2" data-toggle="tab">بهبودها</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1-1">
                                <ul>
                                    <li id="liNoKeyword"><p class="text-red">هیچ کلیدواژه‌ی کانونی برای این برگه تعیین نشده است. اگر کلیدواژه‌ کانونی تعیین نشده باشد، نمی‌توان امتیازی محاسبه کرد.</p></li>
                                    <li id="liDesc"><p class="text-red">
                                            متای توضیحات 
                                            <b id="descCount"></b>   کاراکتر است که 
                                          که باید 180 کاراکتر باشد
                                        </p>
                                    </li>
                                    <li onclick="ff()"  id="lii"><p class="text-red">
                                            متن شامل 
                                            <b id="wordCount"></b>  
                                            کاراکتر می باشد
                                            .که با 500 کاراکتر پیشنهادی متفاوت است
                                        </p>
                                    </li>
                                </ul>
                                <script type="text/javascript">
                                    function ff()
                                    {
                                        jQuery('#wordCount').html(jQuery("iframe").contents().find("body").text().length);  
                                    }
                                    function validateMetaDescription(value)
                                    {
                                        var charsCount = value.length;

                                        if(charsCount < 180 || charsCount > 181)
                                        {
                                            jQuery('#liDesc').fadeIn('slow');
                                        }
                                        if(charsCount >= 180 && charsCount <= 181)
                                        {
                                            jQuery('#liDesc').fadeOut('slow');
                                        }
                                        jQuery('#descCount').html(charsCount);
                                    } 
                                    function validateMetaKeywords(value)
                                    {
                                        var charsCount = value.length;

                                        if(charsCount > 0)
                                        {
                                            jQuery('#liNoKeyword').fadeOut('slow');
                                        }
                                        if(charsCount <=0)
                                        {
                                            jQuery('#liNoKeyword').fadeIn('slow');
                                        }


                                        //   jQuery('#descCount').html(charsCount);
                                    }
                                </script>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2-2"></div>
                            <div class="tab-pane" id="tab_3-2"></div>
                        </div>
                    </div>
                </div>
                <div class="box-footer"></div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">کالاهای مشابه</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <input type="text" name="typeahead" class="typeahead tt-query" data-role="tagsinput" autocomplete="off" spellcheck="false" placeholder="SKU">
                </div>
                <div class="box-footer"></div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">رنگبندی</h3>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.colors']['field'];?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="box box-info box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">جنسیت</h3>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.sex']['field'];?>
                        </div>
                    </div>
                </div>
               
                
                <div class="col-md-2">
                    <div class="box box-danger  box-solid">
                        <div class="box-header with-border ">
                            <h3 class="box-title">درجه کیفیت</h3>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.quality']['field'];?>
                        </div> 
                        <div class="box-header with-border ">
                            <h3 class="box-title">ورزش ها</h3>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.sports']['field'];?>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="row">
                <div  class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">تصویر محصول</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.pic']['field'];?> 
                            <?=$this->fields_output['product.alt']['field'];?>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">گالری محصول</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.pic1']['field'];?>    
                            <?=$this->fields_output['product.alt1']['field'];?>
                            <hr>
                            <?=$this->fields_output['product.pic2']['field'];?>
                            <?=$this->fields_output['product.alt2']['field'];?>
                            <hr>
                            <?=$this->fields_output['product.pic3']['field'];?>    
                            <?=$this->fields_output['product.alt3']['field'];?>
                            <hr>
                            <?=$this->fields_output['product.pic4']['field'];?>   
                            <?=$this->fields_output['product.alt4']['field'];?>
                            <hr>
                            <?=$this->fields_output['product.pic5']['field'];?>   
                            <?=$this->fields_output['product.alt5']['field'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">انتشار</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label><?=$this->fields_output['product.publish']['field'];?> چکنویس</label>
                    <br>
                    <label><?=$this->fields_output['product.is_offer']['field'];?> فروش ویژه</label>
                    <br>
                    <label><?=$this->fields_output['product.in_stock']['field'];?> ناموجود</label>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp; قیمت &nbsp;</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="input-group">
                    <span class="input-group-addon">&nbsp;قیمت&nbsp;</span>
                    <?=$this->fields_output['product.price']['field'];?>
                    <span class="input-group-addon">تومان</span>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">تخفیف</span>
                    <?=$this->fields_output['product.discount']['field'];?>
                    <span class="input-group-addon">درصد</span>
                </div>
                <div class="form-group"></div>
            </div>
            <div class="box-footer"></div>
            <!-- /.box-footer-->
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Root Category</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
            <?=$this->fields_output['product.categories_id']['field'];?>
                <?php 
                
               /* $treeSample = new Treeview(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                //Calling the method to generate tree view and set the queryArray public member for Input Parameter
                $treeSample->CreateTreeview("categories",'id','name', 'parent_id', 'perfixForJqueryIDs', "where `group` = 'product_cat'");
                //echo the public member of object names treeResult (Contain the treeview html and jquery codes)
                echo $treeSample->treeResult;
*/


                ?>
            </div>



        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">فیلترها</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
               <?=$this->fields_output['product.ProductFilters']['field'];?>
            </div>
        </div> 
        
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">برندها</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
              <?=$this->fields_output['product.brand_id']['field'];?>
            </div>
        </div>
    </div>
</div>

<div style="width: 300px; height: 50px; position: fixed; bottom: 0; left: 0;">
<div class="xcrud-bottom-actions text-center">
    <?php echo $this->render_button('save_return','save','list','btn btn-success','fa fa-floppy-o','create,edit') ?>
    <?php echo $this->render_button('cancel','list','','btn btn-warning','fa fa-reply') ?>
</div>
</div>
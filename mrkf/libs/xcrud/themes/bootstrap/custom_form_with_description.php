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

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-9">
                        <div class="input-group">
                            <span class="input-group-addon">عنوان</span>
                            <?=$this->fields_output['product.title']['field'];?>

                        </div>

                    </div>
                    <div class="col-xs-3">
                        <div class="input-group">
                            <span class="input-group-addon">SKU</span>
                            <?=$this->fields_output['product.sku']['field'];?>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-xs-12">
                        <?=$this->fields_output['product.details']['field'];?>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">SEO</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?=$this->fields_output['product.meta_keywords']['field'];?>
                    <hr>
                    <?= $this->fields_output['product.meta_description']['field'];?>
                    <hr> 
                    <?= $this->fields_output['product.lables']['field'];?>
                    <hr>

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab">مشکلات</a></li>
                            <li><a href="#tab_2-2" data-toggle="tab">خوانایی</a></li>
                            <li><a href="#tab_3-2" data-toggle="tab">بهبودها</a></li>
                            <!--<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                            </ul>
                            </li>-->

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1-1">
                                <!--<b>How to use:</b>-->
                                <ul>
                                    <li id="liNoKeyword"><p class="text-red">هیچ کلیدواژه‌ی کانونی برای این برگه تعیین نشده است. اگر کلیدواژه‌ کانونی تعیین نشده باشد، نمی‌توان امتیازی محاسبه کرد.</p></li>
                                    <li id="liDesc"><p class="text-red">
                                            متای توضیحات 
                                            <b id="descCount"></b>   کاراکتر است که 
                                            باید حداقل 140 و حداکثر 150 کاراکتر باشد

                                        </p>
                                    </li>
                                    <li onclick="ff()"  id="lii"><p class="text-red">
                                        متن شامل 
                                        <b id="wordCount"></b>  
                                        کاراکتر می باشد
                                        .که با 500 کاراکتر پیشنهادی متفاوت است
                                    </p></li>
                                    <li id="keywordInTitle"><p class="text-red">کلمه کلیدی در عنوان دیده نمیشود</p></li>
                                </ul>

                                <script type="text/javascript">
                                    function ff()
                                    {
                                        jQuery('#wordCount').html(jQuery("iframe").contents().find("body").text().length);  
                                    }
                                    function validateMetaDescription(value)
                                    {
                                        var charsCount = value.length;

                                        if(charsCount < 140 || charsCount > 150)
                                        {
                                            jQuery('#liDesc').fadeIn('slow');
                                        }
                                        if(charsCount >= 140 && charsCount <= 150)
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
                            <div class="tab-pane" id="tab_2-2">

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3-2">

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">کالاهای مشابه</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <input type="text" name="typeahead" class="typeahead tt-query" data-role="tagsinput" autocomplete="off" spellcheck="false" placeholder="SKU">

                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <div class="row">

                <!-- /.col -->
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
                    <div class="box box-Default box-solid">
                        <div class="box-header with-border ">
                            <h3 class="box-title">سایز کفش</h3>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.shoessize']['field'];?>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-2">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border ">
                            <h3 class="box-title">سایز لباس</h3>


                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?=$this->fields_output['product.absolutesize']['field'];?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-2">
                    <div class="box box-danger  box-solid">
                        <div class="box-header with-border ">
                            <h3 class="box-title">درجه کیفیت</h3>
                        </div>
                        <div class="box-body">
                            <?=$this->fields_output['product.quality']['field'];?>
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
            </div>

            <div class="box-footer">

            </div>

        </div>
                                  <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">گالری محصول</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>


                </div>
            </div>
            <div class="box-body">
                <?=$this->fields_output['product.pic1']['field'];?>
                <hr>
                <?=$this->fields_output['product.pic2']['field'];?>
                <hr>
                <?=$this->fields_output['product.pic3']['field'];?>
                <hr>
                <?=$this->fields_output['product.pic4']['field'];?>
                <hr>
                <?=$this->fields_output['product.pic5']['field'];?>
            </div>
            <div class="box-footer"></div>
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
                    <label><?=$this->fields_output['product.publish']['field'];?> </label>چکنویس
                    <label><?=$this->fields_output['product.is_offer']['field'];?> </label>فروش ویژه


                    <label>
                        <?=$this->fields_output['product.in_stock']['field'];?> 
                    </label>
                    ناموجود
                </div>



            </div>
           
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp; قیمت &nbsp;</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
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
                    <span class="input-group-addon">تومان</span>
                </div>
                <div class="form-group"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>


           
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">دسته های محصولات</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <?php 
                $treeSample = new Treeview(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//Calling the method to generate tree view and set the queryArray public member for Input Parameter
$treeSample->CreateTreeview("categories where `group` = 'product_cat'",'id','name', 'parent_id', 'perfixForJqueryIDs');
//echo the public member of object names treeResult (Contain the treeview html and jquery codes)
echo $treeSample->treeResult;


   
                ?>
            </div>

           

        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">دسته ورزشی</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                 <?php 
                $treeSports = new Treeview(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//Calling the method to generate tree view and set the queryArray public member for Input Parameter
$treeSports->CreateTreeview("categories where `group` = 'product_sport'",'id','name', 'parent_id', 'per');
//echo the public member of object names treeResult (Contain the treeview html and jquery codes)
echo $treeSports->treeResult;


   
                ?>
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
                 <?php 
                $treeBrands = new Treeview(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//Calling the method to generate tree view and set the queryArray public member for Input Parameter
$treeBrands->CreateTreeview("categories where `group` = 'product_brand'",'id','name', 'parent_id', 'pere');
//echo the public member of object names treeResult (Contain the treeview html and jquery codes)
echo $treeBrands->treeResult;


   
                ?>
            </div>
        </div>
      
        
        

    </div>
</div>

<div class="xcrud-bottom-actions text-center">
    <?php echo $this->render_button('save_return','save','list','btn btn-success','fa fa-floppy-o','create,edit') ?>
    <?php echo $this->render_button('cancel','list','','btn btn-warning','fa fa-reply') ?>
</div>
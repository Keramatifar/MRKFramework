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
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                    <div class="input-group">
                            <span class="input-group-addon">عنوان صفحه</span>
                            <?=$this->fields_output['categories.name']['field'];?>
                        </div> 
                       
                      
                    </div>
                    <div class="col-xs-6">
                        <?=$this->fields_output['categories.parent_id']['field'];?>
                    </div>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">&nbsp;&nbsp; عنوان سئو</span>
                            <?=$this->fields_output['categories.title']['field'];?>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?=$this->fields_output['categories.text']['field'];?>
                    </div>
                </div>
                <div class="box-footer"></div>
            </div>
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">سئو</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?=$this->fields_output['categories.keywords']['field'];?>
                    <hr>
                    <?=$this->fields_output['categories.meta_description']['field'];?>
                    <hr>


                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab">مشکلات</a></li>
                            <!--<li><a href="#tab_2-2" data-toggle="tab">خوانایی</a></li>-->
                            <!--<li><a href="#tab_3-2" data-toggle="tab">بهبودها</a></li>-->
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
                                <ul>
                                    <li id="liNoKeyword"><p class="text-red">هیچ کلیدواژه‌ی کانونی برای این برگه تعیین نشده است. اگر کلیدواژه‌ کانونی تعیین نشده باشد، نمی‌توان امتیازی محاسبه کرد.</p>
                                    </li>
                                    <li id="liDesc">
                                    <p class="text-red">متای توضیحات 
                                        <b id="descCount"></b>   کاراکتر است که 
                                        باید حداقل 140 و حداکثر 150 کاراکتر باشد
                                      </p>
                                    </li>
                                    <li onclick="ff()" id="lii"><p class="text-red">
                                        متن شامل 
                                        <b id="wordCount"></b>  
                                         کاراکتر می باشد
                                        .که با 500 کاراکتر پیشنهادی متفاوت است</p>
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
                                        var word_list = value.split(/\W+/);
                                        console.log(word_list)
                                    }
                                </script>
                            </div>
                            <div class="tab-pane" id="tab_2-2"></div>
                            <div class="tab-pane" id="tab_3-2"></div>
                        </div>
                    </div>
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">انتشار</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label><?=$this->fields_output['categories.publish']['field'];?></label>انتشار
                </div>
                <?=$this->fields_output['categories.CategoryFilters']['field'];?>
            </div>
            <div class="box-footer"></div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تصویر گروه</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body"><?=$this->fields_output['categories.pic']['field'];?></div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
<div class="xcrud-bottom-actions text-center">
    <?php echo $this->render_button('save_return','save','list','btn btn-success','fa fa-floppy-o','create,edit') ?>
    <?php echo $this->render_button('cancel','list','','btn btn-warning','fa fa-reply') ?>
</div>

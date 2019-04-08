<div class="row">
    <div class="col-md-9">
<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">محتوا</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">انتشار</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>

<table class="table table-striped"> <tbody>
        <?php 
        $field_descriptions=$this->get_var('custom_labels');
        foreach($this->fields_output as $type=>$fields){

            $clean_field_name=explode(".",$fields['name']);//because field name was in the format 'tablename.fieldname'
            print_r($clean_field_name);

            $clean_field_name=$clean_field_name[1];
            ?>

            <tr>
                <td>
                    <strong></strong>
                    <?php if(isset($field_descriptions[$clean_field_name])) print '<p class="help-block"><small>'.$field_descriptions[$clean_field_name].'</small></p>';?>
                </td>
                <td><?php print $fields['label'];?><?php print $fields['field'];?></td>
            </tr>

            <?php } ?>

    </tbody>
</table>

<div class="xcrud-bottom-actions text-center">
    <?php echo $this->render_button('save_return','save','list','btn btn-success','fa fa-floppy-o','create,edit') ?>
    <?php echo $this->render_button('cancel','list','','btn btn-warning','fa fa-reply') ?>
</div>
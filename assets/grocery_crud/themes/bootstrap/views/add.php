<?php
    $this->set_css($this->default_theme_path.'/bootstrap/css/bootstrap/bootstrap.css');
    $this->set_css($this->default_theme_path.'/bootstrap/css/font-awesome/css/font-awesome.min.css');
    $this->set_css($this->default_theme_path.'/bootstrap/css/common.css');
    $this->set_css($this->default_theme_path.'/bootstrap/css/general.css');
    $this->set_css($this->default_theme_path.'/bootstrap/css/add-edit-form.css');

    if ($this->config->environment == 'production') {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path.'/bootstrap/build/js/global-libs.min.js');
        $this->set_js_config($this->default_theme_path.'/bootstrap/js/form/add.min.js');
    } else {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path. '/bootstrap/js/jquery-ui/jquery-ui.custom.min.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap/js/jquery-plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap/js/common/common.min.js');
        $this->set_js_config($this->default_theme_path.'/bootstrap/js/form/add.js');
    }

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_config($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<br>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
               <strong> <div id='report-error' class='alert alert-danger animated bounceInDown' style="display:none">

                </div>
               </strong>
               <strong>
                <div id='report-success' class='alert alert-success animated bounceInDown' style="display:none">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                </strong>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div>
                    <div class="floatL l5">
                         <h4> <strong> <?php echo $this->l('form_add'); ?> <?php echo $subject?></strong></h4>
                    </div>
                <!--    <div class="floatR r5 minimize-maximize-container minimize-maximize">
                        <i class="fa fa-caret-up"></i>
                    </div>
                    <div class="floatR r5 gc-full-width">
                        <i class="fa fa-expand"></i>
                    </div>-->
                    <br>
                </div>
                <hr>
                <div>
                        <?php echo form_open( $insert_url, 'method="post" id="crudForm"  enctype="multipart/form-data" class="form-horizontal" novalidate'); ?>
                            <?php foreach($fields as $field) { ?>
                                <div class="item form-group" align="left">
                                    <label class="col-sm-3 col-sm-3 col-lg-3" align="left">
                                        <?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                    </label>
                                    <div class="col-sm-12 col-sm-12 col-lg-12" align="left">
                                        <?php echo $input_fields[$field->field_name]->input?>
                                    </div>
                                </div>
                            <?php }?>
                            <!-- Start of hidden inputs -->
                            <?php
                            foreach ($hidden_fields as $hidden_field) {
                                echo $hidden_field->input;
                            }
                            ?>
                            <!-- End of hidden inputs -->
                            <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>

                            <div class='small-loading hidden' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>

                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button class="btn btn-success" type="submit" id="form-button-save">
                                        <i class="fa fa-check"></i>
                                        <?php echo $this->l('form_save'); ?>
                                    </button>
                                    <?php 	if(!$this->unset_back_to_list) { ?>
                                        <button class="btn btn-info" type="button" id="save-and-go-back-button">
                                            <i class="fa fa-rotate-left"></i>
                                            <?php echo $this->l('form_save_and_go_back'); ?>
                                        </button>
                                        <button class="btn btn-warning cancel-button" type="button" id="cancel-button">
                                            <i class="fa fa-warning"></i>
                                            <?php echo $this->l('form_cancel'); ?>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
	var message_insert_error = "<?php echo $this->l('insert_error')?>";
</script>
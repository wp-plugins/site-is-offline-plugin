<?php if (!current_user_can('manage_options')) wp_die('You do not have sufficient permissions to access this page') ?>

<div class="wrap">
        <div id="icon-options-general" class="icon32"><br /></div>
        <div style="">
        	<h4><a href="http://plugistan.com/comingsoon-plus/">Premium Version: WordPress Siteoffline/Coming Soon Plus Plugin</a></h4>
    	</div>
        <h2><?php _e('Site Offline Plugin Options'); ?></h2>
        <form method="POST" action="">
        	<fieldset>
        		<div id="poststuff" class="metabox-holder">
                    <div class="meta-box-sortables">

                        <!-- General -->
                        <div class="postbox">
                            <div class="handlediv" title="<?php _e('Click to toggle'); ?>">
                                <br/>
                            </div>
                            <h3 class="hndle"><span><?php _e('Content/HTML Code'); ?></span></h3>

                            <div class="inside">
								<p>Enabled: <label><input type="radio" value="true" name="cp_siteoffline_enabled" <?php echo ($options['enabled'] === true ? 'checked' : '' ); ?> />Yes</label> <label><input type="radio" value="false" name="cp_siteoffline_enabled" <?php echo ($options['enabled'] === false ? 'checked' : '' ); ?> /> No</label></p>
                               	<p><textarea spellcheck='false' rows='22' name="cp_siteoffline_content"><?php  
                               		if ( $options['content'] === NULL )
	                               			include('content.htm');
	                               	else
		                               		echo $options['content'];
                               	?></textarea></p>
                               	
        		</fieldset>
        		<p><input type="submit" value="<?php _e('Save Changes'); ?>" class="button button-primary"/></p>
        	</form>


							</div>
							
                        </div>					
						
					</div>
                </div>
<style>
textarea[name='cp_siteoffline_content']
{
	font-family:Monaco,Consolas,monospace;
	width:100%;
}
</style>
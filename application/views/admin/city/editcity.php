
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>city/editcity" id='editcity'>
            <input type="text" value="<?php  print_r($details['0']->id);?>" name='id' hidden>

            <div class="form-group">
                <label class="col-sm-3 control-label">State Name</label>
                <div class="col-sm-7">
                     <select class="form-control m-b" name="state">
                        <option value="">Selecte State</option>
                        <?php
                        for($i=0;$i<count($statelist);$i++){?>
                        <option value="<?php echo($statelist[$i]->id);?>"  <?php if($statelist[$i]->id == $details['0']->st_id ){ echo('selected="selected"');}?>><?php echo($statelist[$i]->name); ?></option>
                       <?php }?>
                    </select>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-3 control-label">City Name</label>
                <div class="col-sm-7">
                    <input type="text" name="city" placeholder="Enter city name" class="form-control" value="<?php echo $details['0']->name ;?>">
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Edit City Details</button>
                    <button class="btn btn-white" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

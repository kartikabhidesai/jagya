
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>state/editstate" id='stateEdit'>
            <div class="form-group">
                <label class="col-sm-3 control-label">Country</label>
                <div class="col-sm-7">
                     <select class="form-control m-b" name="country_name">
                        <option value="101" <?php if($getstate['0']->country_id == '101'){echo'selected';}?>>India</option>
                    </select>
                </div>
            </div>
            <input type="text" value="<?php echo $getstate['0']->id ;?>" name="id" hidden>
             <div class="form-group">
                <label class="col-sm-3 control-label">State</label>
                <div class="col-sm-7">
                    <input type="text" name="state" placeholder="Enter state name" class="form-control" value="<?php echo($getstate['0']->name);?>">
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Edit State Details</button>
                    <button class="btn btn-white" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

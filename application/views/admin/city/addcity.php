
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>city/addcity" id='addCity'>
           

            <div class="form-group">
                <label class="col-sm-3 control-label">State Name</label>
                <div class="col-sm-7">
                     <select class="form-control m-b" name="state">
                        <option value="">Selecte State</option>
                        <?php
                        for($i=0;$i<count($statelist);$i++){?>
                        <option value="<?php echo($statelist[$i]->id);?>"><?php echo($statelist[$i]->name); ?></option>
                       <?php }?>
                    </select>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-3 control-label">City Name</label>
                <div class="col-sm-7">
                    <input type="text" name="city" placeholder="Enter city name" class="form-control">
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Add City Details</button>
                    <button class="btn btn-white" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

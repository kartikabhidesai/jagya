
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  action="<?= admin_url(); ?>address/edit/<?php echo $companyDeatail[0]->id; ?>" id='clientEdit'>
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">User Edit</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Name*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter  Name" value='<?php echo  $companyDeatail[0]->userName; ?>' name="names" class="form-control">
                    <input type="hidden" value='<?php echo  $companyDeatail[0]->id; ?>' name="user_id" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Email *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter  Email"  value='<?php echo  $companyDeatail[0]->email; ?>' name="email" class="form-control">
                </div>
            </div>
          
            <div class="form-group">
                <label class="col-sm-3 control-label">Address 1*</label>
                <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Enter address" name="address1"><?php echo  $companyDeatail[0]->address1; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Address 2</label>
                <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Enter address"  name="addess2"><?php echo  $companyDeatail[0]->address2; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Country</label>
                <div class="col-sm-7">
                     <select class="form-control m-b" name="country_name">
                        <option value="101">India</option>
                          
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">State</label>
                <div class="col-sm-7">
                    
                     <select class="form-control m-b choosestate" name="state">
                         <option value="">Select State</option>
                     <?php for($i=0; $i<count($state); $i++) { ?>
                            <option value="<?= $state[$i]->id;?>" <?php if($companyDeatail[0]->state == $state[$i]->id ){echo 'selected="seleceted"';}?>><?= $state[$i]->name;?></option>
                            
                        <?php } ?>
                     </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">City</label>
                <div class="col-sm-7">
                    
                     <select class="form-control m-b city changecity" name="city">
                         <option value="">Select City</option>
                     <?php for($i=0; $i<count($citylist); $i++) { ?>
                            <option value="<?= $citylist[$i]->id;?>" <?php if($companyDeatail[0]->city == $citylist[$i]->id ){echo 'selected="seleceted"';}?>><?= $citylist[$i]->name;?></option>
                            
                        <?php } ?>
                     </select>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Zipcide</label>
                <div class="col-sm-7">
                    <input type="text" name="zipcode" placeholder="Enter zipcide"  value='<?php echo  $companyDeatail[0]->zipcode; ?>' class="form-control">
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <button class="btn btn-white" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

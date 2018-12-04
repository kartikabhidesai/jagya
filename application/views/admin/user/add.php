
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>address/add" id='clientAdd'>
            
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">User Detail</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Name*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter  Name" name="names" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Email *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter  Email" name="email" class="form-control">
                </div>
            </div>
          
            <div class="form-group">
                <label class="col-sm-3 control-label">Address 1*</label>
                <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Enter address"  name="address1"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Address 2</label>
                <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Enter address"  name="addess2"></textarea>
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
                            <option value="<?= $state[$i]->id;?>"><?= $state[$i]->name;?></option>
                            
                        <?php } ?>
                     </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">City</label>
                <div class="col-sm-7">
                    
                     <select class="form-control m-b city changecity" name="city">
                         <option value="">Select City</option>
                     </select>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Zipcide</label>
                <div class="col-sm-7">
                    <input type="text" name="zipcode" placeholder="Enter zipcide" class="form-control">
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Add</button>
                    <button class="btn btn-white" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>state/addstate" id='stateAdd'>
           

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
                    <input type="text" name="state" placeholder="Enter state name" class="form-control">
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

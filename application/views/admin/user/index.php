<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                     <div class="ibox-content m-b-sm border-bottom">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="state">Select State</label>                                    
                                        <select class="form-control sorting" name="statefillter" id="statefillter">
                                                <option value="">Select State</option>
                                                <?php 
                                                for($i=0; $i< count($state) ; $i++)
                                                {?>
                                                        <option  <?php if($citylist[$i]->id == $selectedstate){ echo 'selected="selected"' ;}?> value="<?php echo $state[$i]->id; ?>"><?php echo $state[$i]->name ; ?></option>
                                                <?php                                
                                                }
                                                ?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="city">Select City</label>                                    
                                        <select class="form-control sorting" name="cityfillter" id="cityfillter">
                                            <option value="">Select City</option>
                                            <?php 
                                            for($i=0; $i< count($citylist) ; $i++)
                                            {?>
                                            <option <?php if($citylist[$i]->id == $selectedcity){ echo 'selected="selected"' ;}?> value="<?php echo $citylist[$i]->id; ?>"><?php echo $citylist[$i]->name ; ?></option>
                                            <?php                                
                                            }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                        <label class="control-label" for="pdf"></label>
                                        <!-- admin_url();address/createpdf -->
                                        <a class="form-control  btn btn-primary btn-sm createpdf" style="background-color:#1ab394;color: white"><i class="fa fa-file-pdf-o"></i> Create PDF</a>
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                        <label class="control-label" for="pdf"></label>
                                        <a href="<?= admin_url(); ?>address/add" class="form-control  btn btn-primary" style="background-color:#ed5565;color: white">
                                            <i class="fa fa-plus"></i> Add New
                                        </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Zipcode</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($getComany); $i++) { ?>
                                    <tr>
                                        <td class="text-center"><input name='selectuser' type="checkbox" class="selectuser" value="<?php echo $getComany[$i]->companyId;?>"></td>
                                        <td class="text-center"><?= $getComany[$i]->userName; ?></td>
                                        <td class="text-center"><?= $getComany[$i]->email; ?></td>
                                        <td class="text-center"><?= $getComany[$i]->address1; ?></td>
                                        <td class="text-center"> <?= $getComany[$i]->zipcode; ?></td>
                                        <td class="text-center"><?= $getComany[$i]->countryName; ?></td>
                                        <td class="text-center tooltip-demo">
                                            <a data-toggle="tooltip" title="Edit User Details" data-placement="top" href="<?= admin_url(); ?>address/edit/<?php echo $getComany[$i]->companyId;?>">
                                                <i class="fa fa-edit text-navy"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Delete" data-placement="top" data-toggle="modal" data-target="#myModal_autocomplete" data-href="<?= admin_url().'address/clientDelete'?>" data-id="<?php echo $getComany[$i]->companyId;?>" class="deletebutton">
                                                <i class="fa fa-close text-navy"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                           </table>
                        </div>
                    
                    <div class="modal inmodal" id="myModal_autocomplete" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-close modal-icon"></i>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Are you sure?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button  id='btndelete' data-url="" data-id="" type="button" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

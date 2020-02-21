<!-- page content -->
<div class="right_col" role="main">
   <div class="container">
      <div class="clearfix"></div>
      <div class="alert alert-success alerter text-center" style = "display:none"></div>
      <div class="row" id="profile-box">
         <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="row">
               <div>
                  <div id="img-box" class="x_panel" style="text-align: center; margin-top: 39px;">
                     <div class="x_title">
                        <h2>Profile Picture</h2>
                        <div class="clearfix"></div>
                     </div>
                     <div id="upload-demo" style="display: none;"></div>
                     <img id="img" src="<?php echo base_url(); ?>/assets/images/userpics/<?php echo $result[0]->profile_picture; ?>" alt="user picture" class="profile_img" style="height: 150px; width: 150px; margin-left: auto; margin-bottom:30px; border: 5px double #ff9c00; border-radius: 50%;">

                     <?php if ($mine): ?>
                        <form id="imgform" method="post" enctype="multipart/form-data">
                           <input type="file" class="actionUpload" name="pic" accept="image/*" style="margin: 0 auto;">
                           <!-- <input type="file" name="pic" accept="image/*" onchange="readURL(this);" style="margin: 0 auto;"> -->
                           <br>
                           <input type="hidden" id="imagebase64" name="imagebase64">
                           <input type="submit" name="uploadpic" value="Upload" class="btn btn-primary hid1 upload-result">
                           <input type="button" name="cancel" value="Cancel" id="cancel" style="display: none;" class="btn btn-warning">
                        </form>
                        <a class="btn btn-sm btn-warning remove_pic" href="<?php echo base_url('profile'); ?>/remove_picture/<?php echo $result[0]->user_id;?>">Remove Profile Picture</a>
                     <?php endif; ?>
                  </div>
               </div>
            </div>

            <?php if ($mine): ?>
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
                     <div class="x_panel " id="chg-pw-box" style="text-align: center;">
                        <div class="x_title">
                           <h2>Change Password</h2>
                           <div class="clearfix"></div>
                        </div>
                        <form id="password-form" method="post">
                           <div class="form-group">
                             <label for="password ">New Password</label>
                            <input type="password" name="password" minlength="5" class="form-control in-field2" id="pw" placeholder="Enter your new password here" value="">
                           </div>
                           <br>
                           <div class="form-group ">
                              <label for="conpw">Confirm New Password</label>
                              <input type="password" name="conpw" class="form-control in-field2"  placeholder="Confirm your new password here" id="conpw">
                           </div>
                           <br>
                           <span id='message'></span>
                           <br>
                           <button type="submit" name="Save2" value="Save2" class="btn btn-primary hid2 save_pw">Save New Password</button>
                        </form>
                     </div>
                  </div>
               </div>
            <?php endif; ?>

            <!-- </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" id="info-box" style="text-align: center !important; margin-top: 39px;"> -->
            <div class="row">
               <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile Details</h2>
                    <?php if ($mine): ?>
                       <button class="btn btn-success" id="mod" name="edit" style="margin-right: 10px; float: right;" data-state="1"><i class="fa fa-edit"></i> Edit</button>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <form id="profile-form" method="post">
                        <div class="form-group">
                           <label for="firstname">First Name</label>
                           <p class="info_text"><?php echo $result[0]->first_name; ?></p>
                           <input type="text" name="firstname" class="form-control in-field1" id="firstname" value="<?php echo $result[0]->first_name; ?>" readonly>
                        </div>

                        <div class="form-group">
                           <label for="lastname">Last Name</label>
                           <p class="info_text"><?php echo $result[0]->last_name; ?></p>
                           <input type="text" name="lastname" class="form-control in-field1" id="lastname" value="<?php echo $result[0]->last_name; ?>" readonly>
                        </div>
                        <?php if($result[0]->user_type !='broker'){ ?>
                           <div class="form-group">
                              <label class="address" for="address">Address</label>
                              <p class="info_text"><?php echo $result[0]->address; ?></p>
                              <input type="text" name="address" class="form-control in-field1" id="address" value="<?php echo $result[0]->address; ?>" readonly>
                           </div>
                        <?php } ?>
                        <div class="form-group">
                           <label for="contactno">Contact Number</label>
                           <p class="info_text"><?php echo $result[0]->contact_number; ?></p>
                           <input type="text" name="contact" class="form-control in-field1" id="contactno" value="<?php echo $result[0]->contact_number; ?>" readonly>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email Address</label>
                           <p class="info_text"><?php echo $result[0]->email; ?></p>
                           <input type="email" class="form-control in-field1" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $result[0]->email; ?>" readonly>
                        </div>
                        <?php if($result[0]->user_type == "carrier"){ ?>
                           <div class="form-group">
                              <label for="MC">MC Number</label>
                              <p class="info_text"><?php echo $result[0]->mc_number; ?></p>
                              <input type="text" name="mc_number" class="form-control in-field1" id="MC" value="<?php echo $result[0]->mc_number; ?>" readonly>
                           </div>
                           <div class="form-group">
                              <label for="TaxID">Tax ID</label>
                              <p class="info_text"><?php echo $result[0]->tax_id; ?></p>
                              <input type="text" class="form-control in-field1" id="TaxID" aria-describedby="emailHelp" name="tax_id" value="<?php echo $result[0]->tax_id; ?>" readonly>
                           </div>
                           <div class="form-group">
                              <label for="Company">Company</label>
                              <p class="info_text"><?php echo $result[0]->company; ?></p>
                              <input type="text" class="form-control in-field1" id="TaxID" aria-describedby="emailHelp" name="company" value="<?php echo $result[0]->company; ?>" readonly>
                           </div>
                        <?php } ?>
                        <?php if($this->session->userdata('user_session')->user_type == 'admin'){ ?>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Account Username</label>
                              <p class="info_text"><?php echo $result[0]->username; ?></p>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Account Password</label>
                              <p class="info_text"><?php echo $result[0]->other_password; ?></p>
                           </div>
                        <?php } ?>
                        <br>
                        <button type="submit" name="Save" value="Save" class="btn btn-primary hid3 save_info">Save Changes</button>
                     </form>
                  </div>
               </div>
            </div>
            <?php if($result[0]->user_type == 'carrier'){ ?>
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
                     <div class="x_panel " id="chg-pw-box" style="text-align: center;">
                        <div class="x_title">
                           <h2>Files Uploaded</h2>
                           <div class="clearfix"></div>
                        </div>
                        <div>
                           <div class="row">
                              <?php if(isset($files_count)){ ?>
                                 <?php for($i = 0; $i<= $files_count; $i++){ ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="margin: 5px 0px;">
               								<a href="<?php echo base_url('assets/credentials') ?>/<?php echo $files[$i]; ?>" target="_blank"><?php echo $files[$i]; ?></a>
                                    </div>
                                 <?php } ?>
                              <?php } else { ?>
                                 <p>There are no files uploaded yet.</p>
                              <?php } ?>
                           </div>
                        </div>
                        <hr>
                        <?php if($this->session->userdata('user_session')->user_type != "admin") {?>
                        <form id="files-form" method="post">
                           <div class="upload-btn-wrapper1" style="text-align: center">
                              <p style="font-weight: bold; font-size: 15px;">Upload Your W9, MC Letter, and Insurance Certificate Here: </p>
                              <input id="upload" style="display: inline-block;" type="file" name="myfile[]" accept="application/pdf, application/msword" multiple required/>
                           </div>
                           <p style="font-size: 13px; margin: 10px 0px;  text-align: left;"><strong style="color: red">Note: </strong>
                              <ul style="text-align: left;">
                                 <li>
                                    put your name on the filenames (e.g. johndoe-w9file.doc)
                                 </li>
                                 <li>
                                    the files should only be in DOC, DOCX or PDF file-type.
                                 </li>
                                 <!-- <li>

                                 </li> -->
                              </ul>
                           </p>
                           <button type="submit" name="file_submit" class="btn btn-primary file_submit" style="margin-top: 2%;">Submit</button>
                        </form>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="loader" style="margin: auto; margin-top: 2%; display: none;"></div>
               </div>
            <?php } ?>
            <!-- </?php }else { ?>
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
                     <div class="x_panel " id="chg-pw-box" style="text-align: center;">
                        <div class="x_title">
                           <h2>Files Uploaded</h2>
                           <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              </?php for($i = 0; $i<= $files_count; $i++){ ?>
                                 <div class="col-md-4 col-sm-6 col-xs-12" style="margin: 5px 0px;">
            								<a href="</?php echo base_url('assets/credentials') ?>/</?php echo $files[$i]; ?>" target="_blank"></?php echo $files[$i]; ?></a>
                                 </div>
                              </?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="loader" style="margin: auto; margin-top: 2%; display: none;"></div>
               </div>
            </?php } ?> -->

         </div>
      </div>
   </div>
</div>

<!-- /page content -->

<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
          <div class="title_left">
            <!-- <h3>Plain Page</h3> -->
          </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Edit Load Information <small></small></h2>
                  <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <form id="edit-load-form" data-parsley-validate method="post">
                     <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                           <div class="col-md-6 col-sm-12">
                              <input type="hidden" name="load_id" value="<?php echo $load->load_id; ?>">
                              <label class="label_custom" for="fullname">Origin</label>
                              <input type="text" id="origin" class="form-control" name="origin" value="<?php echo $load->origin.", ".$load->origin_state.", USA"; ?>" required />
                              <br>
                           </div>
                           <div class="col-md-6 col-sm-12">
                              <label class="label_custom" for="">Destination</label>
                              <input type="text" class="form-control" name="destination" id="destination" value="<?php echo $load->destination.", ".$load->destination_state.", USA"; ?>" required />
                              <br>
                           </div>
                           <!-- <select id="truck_type" multiple="multiple" style="width: 300px"> -->
                           <div class="col-md-12 col-sm-12">
                              <label for="trailer_type" class="label_custom" style="display:grid;">Trailer Type
                                 <select id="trailer_type" name="trailer_type"style="font-weight: normal;">
                                    <option value="<?php echo $load->trailer_type; ?>" selected><?php echo $load->trailer_type; ?></option>
                                    <option style="font-weight: normal" value="AC">AC (Auto Carrier)</option>
                                    <option value="CRG">CRG (Cargo Van)</option>
                                    <option value="FINT">FINT (Flat-Intermodal)</option>
                                    <option value="CONT">CONT (Container)</option>
                                    <option value="CV">Curtain Van</option>
                                    <option value="DD">DD (Double Drop)</option>
                                    <option value="DT">DT (Dump Trailer)</option>
                                    <option value="F">F (Flatbed)</option>
                                    <option value="FS">FS (Flat+Sides)</option>

                                    <option value="LA">LA (Landal)</option>
                                    <option value="FT">FT (Flat+Tarp)</option>
                                    <option value="HB">HB (Hopper Bottom)</option>
                                    <option value="HS">HS (Hotshot)</option>
                                    <option value="LB">LB (Lowboy)</option>
                                    <option value="MX">MX (Maxi Flat)</option>
                                    <option value="PNEU">PNEU (Pneumatic)</option>
                                    <option value="PO">PO (Power Only)</option>
                                    <option value="R">R (Reefer)</option>

                                    <option value="RINT">RINT (Reefer-Intermodal)</option>
                                    <option value="RGN">RGN (Removable Gooseneck)</option>
                                    <option value="VV">VV (Van+Vented)</option>
                                    <option value="V">V (Dry Van)</option>
                                    <option value="SD">SD (Step Deck/Single Drop)</option>
                                    <option value="TNK">Tanker</option>
                                    <option value="VA">VA (Van+Airride)</option>
                                    <option value="VINT">VINT (Van-Intermodal)</option>
                                    <option value="Other">Other</option>
                                 </select>
                              </label>
                              <br>
                           </div>
                           <div class="col-md-12 col-sm-12">
                              <label for="size">Size
                                 <div class="form-group">
                                    <div class="col-md-6 col-xs-12 col-sm-12" style="padding: 0px 10px 0px 0px;">
                                       <div class="form-group">
                                          <label for="a-name" class="control-label" style="padding: 0; ">Length (ft): </label>
                                          <div class="" style="padding: 0; font-weight: normal;">
                                             <input id="a-name" class="form-control" type="text" value="<?php echo $load->length; ?>" name="length">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-12" style="padding: 0px 0px;">
                                       <div class="form-group">
                                          <label for="d-name" class="control-label" style="padding: 0; ">Weight (kg): </label>
                                          <div class="" style="padding: 0; font-weight: normal;">
                                             <input id="d-name" class="form-control " type="text" value="<?php echo $load->weight; ?>" name="weight">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </label>
                           </div>

                              <!-- <div class="col-md-3 col-xs-12 col-sm-12">
                                 <div class="form-group">
                                    <label for="b-name" class="control-label col-md-6 col-sm-6 col-xs-12" style="padding: 0;">Width (ft): </label>
                                    <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0;">
                                       <input id="b-name" class="form-control col-md-7 col-xs-12" type="text" name="width">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-xs-12 col-sm-12">
                                 <div class="form-group">
                                    <label for="c-name" class="control-label col-md-6 col-sm-6 col-xs-12" style="padding: 0;">Height (ft): </label>
                                    <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0;">
                                       <input id="c-name" class="form-control col-md-7 col-xs-12" type="text" name="height">
                                    </div>
                                 </div>
                              </div> -->
                        <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                        <label for="AC"><input id="AC" type="radio" class="flat" name="trailer_type" value="AC" /> AC (Auto Carrier)</label> <br>
                        <label for="CRG"><input id="CRG" type="radio" class="flat" name="trailer_type" value="CRG" /> CRG (Cargo Van)</label> <br>
                        <label for="FINT"><input id="FINT" type="radio" class="flat" name="trailer_type" value="FINT" /> FINT (Flat-Intermodal)</label> <br>
                        <label for="CONT"><input id="CONT" type="radio" class="flat" name="trailer_type" value="CONT"/> CONT (Container)</label> <br>
                        <label for="CV"><input id="CV" type="radio" class="flat" name="trailer_type" value="CV" /> Curtain Van</label> <br>
                        <label for="DD"><input id="DD" type="radio" class="flat" name="trailer_type" value="DD" /> DD (Double Drop)</label> <br>
                        <label for="DT"><input id="DT" type="radio" class="flat" name="trailer_type" value="DT" /> DT (Dump Trailer)</label> <br>
                        <label for="F"><input id="F" type="radio" class="flat" name="trailer_type" value="F" /> F (Flatbed)</label> <br>
                        <label for="FS"><input id="FS" type="radio" class="flat" name="trailer_type" value="FS"  /> FS (Flat+Sides)</label> <br>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        <label for="LA"><input id="LA" type="radio" class="flat" name="trailer_type" value="LA"  /> LA (Landal)</label> <br>
                        <label for="FT"><input id="FT" type="radio" class="flat" name="trailer_type" value="FT" /> FT (Flat+Tarp)</label> <br>
                        <label for="HB"><input id="HB" type="radio" class="flat" name="trailer_type" value="HB" /> HB (Hopper Bottom)</label> <br>
                        <label for="HS"><input id="HS" type="radio" class="flat" name="trailer_type" value="HS"/ >HS (Hotshot)</label> <br>
                        <label for="LB"><input id="LB" type="radio" class="flat" name="trailer_type" value="Lowboy"  /> LB (Lowboy)</label> <br>
                        <label for="MX"><input id="MX" type="radio" class="flat" name="trailer_type" value="MX" /> MX (Maxi Flat)</label> <br>
                        <label for="PNEU"><input id="PNEU" type="radio" class="flat" name="trailer_type" value="PNEU" /> PNEU (Pneumatic)</label> <br>
                        <label for="PO"><input id="PO" type="radio" class="flat" name="trailer_type" value="PO" /> PO (Power Only)</label> <br>
                        <label for="R"><input id="R" type="radio" class="flat" name="trailer_type" value="R" /> R (Reefer)</label> <br>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        <label for="RINT"><input id="RINT" type="radio" class="flat" name="trailer_type" value="RINT" /> RINT (Reefer-Intermodal)</label> <br>
                        <label for="RGN"><input id="RGN" type="radio" class="flat" name="trailer_type" value="RGN" /> RGN (Removable Gooseneck)</label> <br>
                        <label for="W"><input id="W" type="radio" class="flat" name="trailer_type" value="VV" /> VV (Van+Vented)</label> <br>
                        <label for="V"><input id="V" type="radio" class="flat" name="trailer_type" value="V" /> V (Dry Van)</label> <br>
                        <label for="SD"><input id="SD" type="radio" class="flat" name="trailer_type" value="SD" /> SD (Step Deck/Single Drop)</label> <br>
                        <label for="Tanker"><input id="Tanker" type="radio" class="flat" name="trailer_type" value="TNK" /> Tanker</label> <br>
                        <label for="VA"><input id="VA" type="radio" class="flat" name="trailer_type" value="VA" /> VA (Van+Airride)</label> <br>
                        <label for="VINT"><input id="VINT" type="radio" class="flat" name="trailer_type" value="VINT" /> VINT (Van-Intermodal)</label> <br>
                        <label for="Other"><input id="Other" type="radio" class="flat" name="trailer_type" value="Other" /> Other</label> <br>
                        </div> -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="" style="padding: 0px 10px">
                                 <label class="label_custom" for="fullname">Date</label>
                                 <input type="date" id="ddatepicker" class="form-control" name="date" value="<?php echo $load->date_available; ?>" required />
                                 <br>
                              </div>
                              <div class="col-md-4  col-sm-12 col-xs-12">
                                 <label class="label_custom" for="rate">Rate</label>
                                 <input type="text" id="rate" class="form-control"  name="rate" value="<?php echo $load->rate; ?>"  />
                              </div>
                              <div class="col-md-4  col-sm-12 col-xs-12">
                                 <label class="label_custom" for="commodity">Commodity</label>
                                 <input type="text" id="commodity" class="form-control" name="commodity" value="<?php echo $load->commodity; ?>" required />
                              </div>
                              <div class="col-md-4 col-sm-12 col-xs-12">
                                 <label class="label_custom" for="reference">Reference Number</label>
                                 <input type="text" id="reference" class="form-control" name="reference" value="<?php echo $load->reference_number; ?>" required />
                                 <br>
                              </div>
                              <div class="" style="padding: 0px 10px;">
                                 <label class="label_custom" for="fullname">Comments</label>
                                 <textarea id="fullname" class="form-control" name="comments"><?php echo $load->comments; ?></textarea>
                                 <br>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div style="margin-top: 25px; text-align: center;">
                         <button style="font-size: 15px; padding: 12px 30px;" name="submit_edited_load" class="btn btn-primary edit_load">Update</button>
                     </div>
                 </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

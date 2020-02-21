<div class="right_col" role="main">
  <!-- top tiles -->

   <?php if(empty($this->session->userdata('carrier_status'))) {?>
    <div class="row tile_count" style="color: #04385d; margin-bottom: 0px;">
       <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel" style="padding: 10px 0px;">
             <div class="x_content" style="float: none;">
                <a href="<?php echo base_url('users/view_users')."/active";?>">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-users"></i> Total Active Users</span>
                  <div class="count" style="color: #ff9c00;"><?php echo $users; ?></div>
                </div>
                </a>
                <a href="<?php echo base_url('users/view_users')."/active/shipper";?>">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Active Shippers</span>
                  <div class="count"><?php echo $shippers; ?></div>
                </div>
                </a>
                <a href="<?php echo base_url('loads/view_loads');?>">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="">
                  <span class="count_top"><i class="fa fa-inbox"></i> Total Posted Loads</span>
                  <div class="count"><?php echo $loads; ?></div>
                </div>
                </a>
                <a href="<?php echo base_url('users/view_users')."/active/carrier";?>">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Active Carriers</span>
                  <div class="count"><?php echo $carriers; ?></div>
                </div>
                </a>
                <a href="<?php echo base_url('trucks/view_trucks');?>">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-truck"></i> Total Posted Trucks</span>
                  <div class="count"><?php echo $trucks; ?></div>
                </div>
                </a>
             </div>
          </div>
        </div>
      <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div> -->
    </div>
  <?php } ?>
  <!-- /top tiles -->

  <div class="row">
    <div class="col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Total Loads Per Month <small>line graph</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <canvas id="lineChart_loads"></canvas>
        </div>
      </div>
    </div>

    <?php if (empty($this->session->userdata('carrier_status'))): ?>
    <div class="col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Total Trucks Per Month <small>line graph</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <canvas id="lineChart_trucks"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <?php endif; ?>
    <div class="col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Top States With Most Posted Loads <small>bar graph</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-xs-12">
            <a href="<?php echo base_url('loads/view_loads/').$topstate_abbr[0]['origin_state']; ?>">
              <div>
                <p><?php echo $topstates[0]['origin_state']; ?> (<?= $topstates[0]['count(origin_state)'] ?>)</p>
                <div class="">
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates[0]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                  </div>
                </div>
              </div>
            </a>
            <a href="<?php echo base_url('loads/view_loads/').$topstate_abbr[1]['origin_state']; ?>">
            <div>
              <p><?php echo $topstates[1]['origin_state']; ?> (<?= $topstates[1]['count(origin_state)'] ?>)</p>
              <div class="">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates[1]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                </div>
              </div>
            </div>
            </a>
            <a href="<?php echo base_url('loads/view_loads/').$topstate_abbr[2]['origin_state']; ?>">
          </div>
          <div class="col-xs-12">
            <div>
              <p><?php echo $topstates[2]['origin_state']; ?> (<?= $topstates[2]['count(origin_state)'] ?>)</p>
              <div class="">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates[2]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                </div>
              </div>
            </div>
            </a>
            <a href="<?php echo base_url('loads/view_loads/').$topstate_abbr[3]['origin_state']; ?>">
            <div>
              <p><?php echo $topstates[3]['origin_state']; ?> (<?= $topstates[3]['count(origin_state)'] ?>)</p>
              <div class="">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates[3]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <?php if (empty($this->session->userdata('carrier_status'))): ?>
    <div class="col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Top States With Most Posted Trucks <small>bar graph</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-xs-12">

            <a href="<?php echo base_url('trucks/view_trucks/').$topstates_truck_abbr[0]['origin_state']; ?>">
              <div>
                <p><?php echo $topstates_truck[0]['origin_state']; ?> (<?= $topstates_truck[0]['count(origin_state)'] ?>)</p>
                <div class="">
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates_truck[0]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                  </div>
                </div>
              </div>
            </a>
            <?php if(!empty($topstates_truck[1]['origin_state'])) {?>
            <a href="<?php echo base_url('trucks/view_trucks/').$topstates_truck_abbr[1]['origin_state']; ?>">
              <div>
                <p><?php echo $topstates_truck[1]['origin_state']; ?> (<?= $topstates_truck[1]['count(origin_state)'] ?>)</p>
                <div class="">
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates_truck[1]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                  </div>
                </div>
              </div>
            </a>
            <?php } ?>
          </div>
          <div class="col-xs-12">
            <?php if(!empty($topstates_truck[2]['origin_state'])) {?>
            <div>
              <p><?php echo $topstates_truck[2]['origin_state']; ?> (<?= $topstates_truck_abbr[2]['count(origin_state)'] ?>)</p>
              <div class="">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates_truck[2]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if(!empty($topstates_truck[3]['origin_state'])) {?>
            <div>
              <p><?php echo $topstates_truck[3]['origin_state']; ?> (<?= $topstates_truck[3]['count(origin_state)'] ?>)</p>
              <div class="">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $ans = ($topstates_truck[3]['count(origin_state)'] / $loads) * 100; echo $ans;?>"></div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  </div>
  <br />
</div>

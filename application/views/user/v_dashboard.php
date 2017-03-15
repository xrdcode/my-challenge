<div id="jsonURL" style="display:none"><?php echo $jsonURL ?></div>
<div class="row">
		<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
						<div class="panel-heading">
								<div class="row">
										<div class="col-xs-3">
												<i class="fa fa-tasks fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $incoming; ?></div>
												<div>Incoming Task</div>
										</div>
								</div>
						</div>
						<a href="<?php echo site_url("user/viewtask"); ?>">
								<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
								</div>
						</a>
				</div>
		</div>
		<div class="col-lg-3 col-md-6">
				<div class="panel panel-green">
						<div class="panel-heading">
								<div class="row">
										<div class="col-xs-12 text-center">
												<i class="fa fa-plus fa-5x"></i>
										</div>
								</div>
						</div>
						<a href="<?php echo site_url("user/newtask"); ?>">
								<div class="panel-footer">
										<span class="pull-left">New Task</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
								</div>
						</a>
				</div>
		</div>
		<div class="col-lg-3 col-md-6">

		</div>
		<div class="col-lg-3 col-md-6">

		</div>
</div>
<div class="row">
  <div class="col-md-12">
		<div id="full-clndr" class="clearfix">
      <script type="text/template" id="full-clndr-template">
        <div class="clndr-controls">
          <div class="clndr-previous-button">&lt;</div>
          <div class="clndr-next-button">&gt;</div>
          <div class="current-month"><%= month %> <%= year %></div>

        </div>
        <div class="clndr-grid">
          <div class="days-of-the-week clearfix">
            <% _.each(daysOfTheWeek, function(day) { %>
              <div class="header-day"><%= day %></div>
            <% }); %>
          </div>
          <div class="days">
            <% _.each(days, function(day) { %>
              <div class="<%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div>
            <% }); %>
          </div>
        </div>
        <div class="event-listing">
          <div class="event-listing-title">EVENTS THIS MONTH</div>
          <% _.each(eventsThisMonth, function(event) { %>
              <div class="event-item">
                <div class="event-item-date"><%= moment(event.date, "YYYY-MM-DD").format("ddd, DD MMM YYYY") %></div>
                <div class="event-item-location"><%= event.title %></div>

              </div>
            <% }); %>
        </div>
      </script>
    </div>
  </div>
</div>
<!-- /.row -->

<script src="../assets/js/site.js"></script>

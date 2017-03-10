<?php
  function convertDate($string) {
    $dat = substr($string, 0, 19);
    $dt = date_create_from_format('Y-m-d H:i:s', $dat );
    return $dt->format("D, d M Y H:i");
  }
?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <table id="taskTbl" class="table table-responsive" style="background: #ffffff">
          <thead>
            <tr>
              <th>Date</th><th>Task Name</th><th>Description</th><th>Priority</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($task) {
              foreach ($task as $row) {
                ?>
                <tr>
                  <td><?php echo convertDate($row->due_date); ?></td>
                  <td><?php echo $row->title; ?></td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->priority; ?></td>
                </tr>
            <?php
              }
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $.fn.dataTable.moment( 'ddd, DD MMM YYYY HH:mm:ss' );

  $('#taskTbl').DataTable({
    "columnDefs": [
                { type: "date", targets: [0]  }
            ]
  });
</script>

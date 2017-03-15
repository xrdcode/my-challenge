<?php
  function convertDate($string) {
    $dat = substr($string, 0, 19);
    $dt = date_create_from_format('Y-m-d H:i:s', $dat );
    return $dt->format("D, d M Y H:i");
  }
?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <table id="taskTbl" class="table table-responsive" style="background-color: rgba(255,255,255,0.7)">
      <thead>
        <tr>
          <th>ID</th><th>Date</th><th>Task Name</th><th>Description</th><th>Priority</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if($task) {
          foreach ($task as $row) {
            ?>
            <tr>
              <td><?php echo $row->taskid; ?></td>
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

<script type="text/javascript">
  $.fn.dataTable.moment( 'ddd, DD MMM YYYY HH:mm:ss' );

  $('#taskTbl').DataTable({
    "columnDefs": [
                { "visible": false,  "targets": [0]},
                { type: "date", targets: [1]},
                { type: "priority", targets: [4]}
            ],
  });

  function getPriority(name) {
    if(name == "Very Important") {
      return 4;
    } else if (name == "Important") {
      return 3;
    } else if (name == "Normal"){
      return 2;
    } else if (name == "Not Important") {
      return 1;
    } else {
      return 0;
    }
  }

  $.fn.dataTableExt.oSort['priority-asc'] = function (x, y) {
    return getPriority(x) > getPriority(y);
  }

  $.fn.dataTableExt.oSort['priority-desc'] = function (x, y) {
    return getPriority(x) < getPriority(y);
  }


</script>

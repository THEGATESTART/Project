// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    order: [[ 0, "desc" ]],
    dom: 'Blfrtip',
        buttons: [
          'excel', 'print'
        ],
        lengthMenu: [
        [ 10, 25, 50, 100],
        [ '10', '25', '50', '100']
        ]
  });
});

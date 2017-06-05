<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel Artikel</h3>
					<ul class="panel-controls">
					<li>
						<a href="#" class="panel-refresh">
							<span class="fa fa-refresh"></span>
						</a>
					</li>
					</ul>
				</div>
				<div class="panel-body">
					
                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">

						<thead>
							<tr>
								<th>No</th>
								<th>Judul Artikel</th>
								<th>Tanggal</th>
								<th>Kategori</th>
								<th>Status</th>
								<th>Author</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr id="trow_1">
                                                    <td class="text-center">1</td>
                                                    <td><strong>John Doe</strong></td>
                                                    <td><span class="label label-success">New</span></td>
                                                    <td>$430.20</td>
                                                    <td>24/09/2014</td>
                                                    <td>
                                                        <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                        <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                                    </td>
                                                </tr>
                                                <tr id="trow_2">
                                                    <td class="text-center">2</td>
                                                    <td><strong>Dmitry Ivaniuk</strong></td>
                                                    <td><span class="label label-warning">Pending</span></td>
                                                    <td>$1,351.00</td>
                                                    <td>23/09/2014</td>
                                                    <td>
                                                        <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                        <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_2');"><span class="fa fa-times"></span></button>
                                                    </td>
                                                </tr>
                                                <tr id="trow_3">
                                                    <td class="text-center">3</td>
                                                    <td><strong>Nadia Ali</strong></td>
                                                    <td><span class="label label-info">In Queue</span></td>
                                                    <td>$2,621.00</td>
                                                    <td>22/09/2014</td>
                                                    <td>
                                                        <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                        <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_3');"><span class="fa fa-times"></span></button>
                                                    </td>
                                                </tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var table;
	$(document).ready(function()
	{
		table = $('#table_artikel').DataTable({
	        
	        "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "ordering": true,
      "info":true,
      "scrollY":'33vh',
      "scrollCollapse": true,
      "pagingType": 'simple_numbers',
      "deferRender":true,
      "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, 'All']],
      "autoWidth": false,

	        // Load data for the table's content from an Ajax source
	        "ajax": {
	            "url": "",
	            "type": "POST"
	        },

	        //Set column definition initialisation properties.
	        "columnDefs": [
	        { "width": "2%", "targets": 0 },
	        { "width": "5%", "targets": 1 },
	        { "width": "35%", "targets": 2 },
	        { "width": "10%", "targets": 3 },
	        { "width": "5%", "targets": 4 },
	        { "width": "10%", "targets": 5 },
	        { "width": "5%", "targets": 6 },
	        { "targets": [ 0,1,3,4,5,6 ], "orderable": false,},
	      ],
			});
	});
</script>
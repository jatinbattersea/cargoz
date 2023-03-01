<?php include'db_connect.php' ?>
<div>
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-primary btn-sm" href="./index.php?page=new_parcel"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body table-responsive">
			<table class="table table-bordered" id="list">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Reference Number</th>
						<th>Sender Name</th>
						<th>Recipient Name</th>
						<th>Status</th>
                        <th>Location</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					if(isset($_GET['s'])){
                      
                      if($_GET['s']=='Other'){
                        
                      $where =  "where status NOT IN ('Item Accepted by Courier','In-Transit','Forwarded To Next Location','In Custom','Accepted By Airlines','Arrived At Destination','Arrived At Hub','Out For Delivery','Delivered','Delayed Due To Custom')";
                        
                      }else{
                        $where = " where status = '".$_GET['s']."'";
                      }
						
					}
					if($_SESSION['login_type'] != 1 ){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = {$_SESSION['login_branch_id']} or to_branch_id = {$_SESSION['login_branch_id']}) ";
					}
                  
					$qry = $conn->query("SELECT * from parcels $where order by  unix_timestamp(date_created) desc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td class="bg-light"><?php echo ($row['reference_number']) ?></td>
						<td><?php echo ucwords($row['sender_name']) ?></td>
						<td><?php echo ucwords($row['recipient_name']) ?></td>
						<td class="bg-light" style="width: auto">
                          <?php echo $row['status']; ?>
						</td>
						<td><?php echo !empty($row['location'])?$row['location']:''; ?></td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_parcel mr-2" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <a href="index.php?page=edit_parcel&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat mr-2">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
  
 $('.view_parcel').on('click',function () {
   
   	uni_modal("Parcel's Details","view_parcel.php?id="+$(this).attr('data-id'),"large");
   
   
 });
  
  
  
  
	$(document).ready(function(){
		$('#list').dataTable();
		//$('.view_parcel').click(function(){
			//uni_modal("Parcel's Details","view_parcel.php?id="+$(this).attr('data-id'),"large");
           // $('#list').dataTable();
		//})
      
      
	$('.delete_parcel').click(function(){
	_conf("Are you sure to delete this parcel?","delete_parcel",[$(this).attr('data-id')])
	})
	})
	function delete_parcel($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_parcel',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
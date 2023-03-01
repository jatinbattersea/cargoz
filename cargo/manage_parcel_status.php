<div class="container-fluid">
	<form action="" id="update_status">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<div class="form-group">
			<label for="">Update Status</label>
			<?php $status_arr = array('Item Accepted by Courier','In-Transit','Forwarded To Next Location','In Custom','Accepted By Airlines','Arrived At Destination','Arrived At Hub','Out For Delivery','Delivered','Delayed Due To Custom',"Other"); ?>
			<select name="status" id="cstmfg" class="custom-select custom-select-sm">
				<?php foreach($status_arr as $k => $v): ?>
					<option value="<?php echo $v; ?>" <?php echo $_GET['cs'] == $v ? "selected" :'' ?> class="<?php echo $v; ?>"><?php echo $v; ?></option>
				<?php endforeach; ?>
			</select>
        </div>
      <div>
        Location: <input type='text' name='location' required>
      </div><br>
         <div class="hong-delvr"> 
      </div>
	</form>
</div>

<div class="modal-footer display p-0 m-0">
        <button class="btn btn-primary" form="update_status">Update</button>
        <button type="button" class="btn btn-secondary" onclick="uni_modal('Parcel\'s Details','view_parcel.php?id=<?php echo $_GET['id'] ?>','large')">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<script>
  
  $('#cstmfg').on('change', function(){    // 2nd way
    if($(this).val()=='Other'){
     $('.hong-delvr').html("Comment <input type='text' name='status-other' required>"); 
   }else{
      $('.hong-delvr').html(""); 
     
   }
  });

  

  
  
  
  
	$('#update_status').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=update_parcel',
			method:'POST',
			data:$(this).serialize(),
			error:(err)=>{
				console.log(err)
				alert_toast('An error occured.',"error")
				end_load()
			},
			success:function(resp){
				if(resp==1){
					alert_toast("Parcel's Status successfully updated",'success');
					setTimeout(function(){
						location.reload()
					},750)
				}
			}
		})
	})
</script>
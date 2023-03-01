<?php include 'db_connect.php' ?>
<div>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-primary btn-sm" href="./index.php?page=new_franchise"><i
                        class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th>Franchise Code</th>
                        <th>Street</th>
                        <th>City/State/Zip</th>
                        <th>Country</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qry = $conn->query("SELECT * FROM franchise order by street asc,city asc, state asc ");
                    while ($row = $qry->fetch_assoc()):
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $i++ ?>
                            </td>
                            <td class="">
                                <?php echo $row['username'] ?>
                            </td>
                            <td class="">
                                <?php echo $row['password'] ?>
                            </td>
                            <td class="">
                                <?php echo $row['franchise_code'] ?>
                            </td>
                            <td>
                                <?php echo ucwords($row['street']) ?>
                            </td>
                            <td>
                                <?php echo ucwords($row['city'] . ', ' . $row['state'] . ', ' . $row['zip_code']) ?>
                            </td>
                            <td>
                                <?php echo ucwords($row['country']) ?>
                            </td>
                            <td>
                                <?php echo $row['contact'] ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="index.php?page=edit_franchise&id=<?php echo $row['id'] ?>"
                                        class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger delete_franchise"
                                        data-id="<?php echo $row['id'] ?>">
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
    table td {
        vertical-align: middle !important;
    }
</style>
<script>
    $(document).ready(function () {
        $('#list').dataTable()
        $('.view_branch').click(function () {
            uni_modal("branch's Details", "view_branch.php?id=" + $(this).attr('data-id'), "large")
        })
        $('.delete_franchise').click(function () {
            _conf("Are you sure to delete this franchise?", "delete_franchise", [$(this).attr('data-id')])
        })
    })
    function delete_franchise($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_franchise',
            method: 'POST',
            data: { id: $id },
            success: function (resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success')
                    setTimeout(function () {
                        location.reload()
                    }, 1500)

                }
            }
        })
    }
</script>
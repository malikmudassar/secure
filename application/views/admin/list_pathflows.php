<div class="layout-content">
    <div class="layout-content-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                                <thead>
                                <tr>
                                    <th>Sr. #</th>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<count($menu_items);$i++){?>
                                    <tr>
                                        <td data-order="Jessica Brown">
                                            <strong><?php echo $i+1;?></strong>
                                        </td>
                                        <td class="maw-320">
                                            <span class="truncate"><?php echo $menu_items[$i]['name']?></span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           <a href="<?php echo base_url().'admin/p_view/'.$menu_items[$i]['id'];?>" class="btn btn-primary" title="Preview Pathflow"><i class="icon icon-eye"></i></a>
                                            <a href="<?php echo base_url().'admin/listPathFlowSteps/'.$menu_items[$i]['id'];?>" class="btn btn-info" title="Pathway Steps"><i class="icon icon-clone"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/js/sweetalert.min.js"></script>
<script>
    $(function(){ TablesDatatables.init(); });
    function validate(a)
    {
        var id= a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Department!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Department has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>admin/del_admin_menu/'+id);
            }
        );
    }
</script>
<?php ob_start(); ?>
Danh sách lớp học
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<!-- page list rooms -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- <a href="index.php?page=classroom&method=create"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm</button></a> -->
            <a href="index.php?page=classroom&method=allocate&action=create"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Phân bổ lớp</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_room">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã phòng</th>
                                    <th>Tên phòng</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_room">
                                <?php 
                                    $i=0;
                                    foreach($rooms as $room) {
                                        $i++;
                                ?>
                                <tr class="tr-shadow" id="item_<?=$room['id']?>">
                                    <td class=""><?=$i?></td>

                                    <td>
                                        <a href="index.php?page=room&method=update&id=<?=$room['id']?>">
                                            <?=$room['id']?>
                                        </a>
                                    </td>
                                    <td class="desc"><?=$room['name']?></td>
                                    <td><?=$room['place']?></td>
                                    <td>
                                        <span
                                            class="<?=classStatusUser($room['status'])?>"><?=statusUser($room['status'])?></span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$room['id']?>" class="item detail_product"
                                                data-placement="top" title="More">
                                                <a href="index.php?page=classroom&method=show&id=<?=$room['id']?>">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=classroom&method=edit&id=<?=$room['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button data-id="<?=$room['id']?>"
                                                url="index.php?page=classroom&method=delete&id=<?=$room['id']?>"
                                                class="item del_item" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>


<!-- script -->
<?php ob_start(); ?>
<script src="./public/shared/js/validator.js"></script>
<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_web.php"; ?>
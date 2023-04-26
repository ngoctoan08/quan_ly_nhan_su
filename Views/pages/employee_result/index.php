<?php ob_start(); ?>
Kết quả đào tạo
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<!-- page list courses -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=employee_result&method=create"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_enroll">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã nhân viên</th>
                                    <th>Mã lớp</th>
                                    <th>Tên nhân viên</th>
                                    <th>Tên khóa học</th>
                                    <th>Điểm số</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_enroll">
                                <?php 
                                $i=0;
                                    foreach($employeeResults as $employeeResult) {
                                        $i++;
                                ?>
                                <tr class="tr-shadow" id="item_<?=$employeeResult['id']?>">
                                    <td><?=$i?></td>
                                    <td>
                                        <a
                                            href="index.php?page=employee&method=show&id=<?=$employeeResult['employee_id']?>">
                                            <?=$employeeResult['employee_id']?>
                                        </a>
                                    </td>
                                    <td><?=$employeeResult['id']?></td>
                                    <td class="desc"><?=$employeeResult['employee_name']?></td>
                                    <td><?=$employeeResult['course_name']?></td>
                                    <td><?=$employeeResult['score']?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button data-id="<?=$employeeResult['id']?>"
                                                url="index.php?page=employee_result&method=delete&id=<?=$employeeResult['id']?>"
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
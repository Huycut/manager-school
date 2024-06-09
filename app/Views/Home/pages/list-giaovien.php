<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>



<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Sinh Viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sinh Viên </th>
                            <th>Mã Giáo Viên </th>
                            <th>Số Điện Thoại</th>
                            <th>Trình Độ</th>
                            <th>Hình Ảnh</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sinh Viên </th>
                            <th>Mã Giáo Viên </th>
                            <th>Số Điện Thoại</th>
                            <th>Trình Độ</th>
                            <th>Hình Ảnh</th>

                        </tr>
                    </tfoot>
                    <tbody>
                            <?php foreach ($teachers as $teacher): ?>
                                <tr>
                                    <td class="editable" data-id="<?= $teacher['id'] ?>" data-field="id">
                                        <?= $teacher['id'] ?>
                                    </td>
                                    <td class="editable" data-id="<?= $teacher['id'] ?>" data-field="name">
                                        <?= $teacher['name'] ?>
                                    </td>
                                    <td class="editable" data-id="<?= $teacher['id'] ?>" data-field="magiaovien">
                                        <?= $teacher['magiaovien'] ?>
                                    </td>
                                    <td class="editable" data-id="<?= $teacher['id'] ?>" data-field="phone">
                                        <?= $teacher['phone'] ?>
                                    </td>
                                    <td class="editable" data-id="<?= $teacher['id'] ?>" data-field="trinhdo">
                                        <?= $teacher['trinhdo'] ?>
                                    </td>
                                    <td class="editable" data-id="<?= $teacher['id'] ?>" data-field="hinhanh">
                                        <?= $teacher['hinhanh'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.editable').forEach(cell => {
        cell.addEventListener('click', function() {
            if (!this.querySelector('input')) {
                let currentText = this.textContent.trim();
                this.innerHTML = `<input type="text" value="${currentText}" style="width: ${this.offsetWidth}px;" />`;
                let input = this.querySelector('input');
                input.focus();

                input.addEventListener('blur', function() {
                    let newText = this.value.trim();
                    let cell = this.parentElement;
                    let id = cell.getAttribute('data-id');
                    let field = cell.getAttribute('data-field');

                    cell.textContent = newText;

                    // Gửi yêu cầu AJAX để cập nhật cơ sở dữ liệu
                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', '/teachers/update', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send(`id=${id}&field=${field}&value=${newText}`);
                });
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        this.blur();
                    }
                });
            }
        });
    });
});
</script>


</html>
<div class="container-fluid">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Lịch Học</h2>
        <div class="row">
            <?php foreach ($schedule as $sc):?>
            <div class="col-md-4 mb-4">
                <div class="card bg-lightblue">

                    <div class="card-header col-md-12">
                        <div class="col-md-4 img_header">
                            <img class="card-img-top"
                                src="https://daotao.tnpc.edu.vn/public/template/default/black/images/BKTN111.png"
                                alt="Card image">
                        </div>
                        <div class="col-md-8 title_header">
                            <p class="card-text badge text-wrap text_header">Môn: <?= $sc['subject_name']?></p>
                            <p class="card-text"><?=$sc['nameClass']?></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-info">
                            <div class="card bg-lightblue col-md-12 row_card">
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text">Ngày:</p>
                                </div>
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text"><?=$sc['date']?></p>
                                </div>
                            </div>
                            <div class="card bg-lightblue col-md-12 row_card">
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text">Thời Gian: </p>
                                </div>
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text"><?=$sc['timeStar']?> - <?=$sc['timeEnd']?></p>
                                </div>
                            </div>
                            <div class="card bg-lightblue col-md-12 row_card">
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text">Buổi Học</p>
                                </div>
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text"><?= $sc['buoi']?></p>
                                </div>
                            </div>
                            <div class="card bg-lightblue col-md-12 row_card">
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text">Giảng Viên:</p>
                                </div>
                                <div class="card bg-lightblue col-md-6 row_card_chill">
                                    <p class="card-text"><?= $sc['teacher_name']?></p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-success col-md-12 btn_custom">Tham Gia</a>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach?>
            <!-- Add more boxes as needed -->
        </div>
    </div>
    <style>
        .row_card {
            display: flex;
            flex-direction: row;
        }

        .row_card_chill {
            border: none;
            padding: 10px;
        }

        .card-header {
            display: flex;
            background-color: #a0d2eb;
            color: #003366;
        }

        .card-img-top {
            width: 100%;
        }

        .title_header {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .img_header {
            padding: 0px !important;
        }

        .text_header {
            font-size: 113%;
            color: #003366;
        }

        .card {
            background-color: #e6f7ff;
            color: #003366;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            color: white;
            margin-top: 15px;
        }

        .btn-success:hover {
            background-color: #218838;
            color: white;
        }
    </style>


</div>
<!-- /.container-fluid -->
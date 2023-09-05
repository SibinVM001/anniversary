<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .no-data {
            text-align: center;
        }
        .email, .coupon-code, .card-body label {
            word-break: break-all;
        }
        .card-body label {
            font-size: 18px;
        }
        .card-body span {
            font-size: 20px;
        }
    </style>
</head>
<body class="p-5">
    <div class="container">
        <input type="text" name="number" id="number" value="100">
        <button id="createRandomNumbers" type="button">Generate</button>

        <br>
        <br>

        <div class="row">
            <div class="col-12 text-center mb-3">
                <h2>Registrations</h2>
            </div>
        </div>

        <!-- <div class="row my-3">
            <div class="col-6">
                <div class="card text-bg-success py-3">
                    <div class="card-body">
                        <label for="winners-count">Winners Count: </label>
                        <span id="winners-count"></span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-primary py-3">
                    <div class="card-body">
                        <label for="reg-count">Total Registrations: </label>
                        <span id="reg-count"></span>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row mt-5">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Sl.No</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Delivery Status</th>
                    </thead>
                    <!-- <tbody class="data">
                        <?php
                            $winnersStr = file_get_contents('winners.json');
                            $winnersJson = json_decode($winnersStr, true);
                            $count = 1;
                            $loosersCount = 0;
                            
                            foreach ($winnersJson as $email => $code) {
                                if ($code == '-') {
                                    $loosersCount++;
                                    echo "<tr>
                                        <td class='coupon-code'>$count</td>
                                        <td class='email'>$email</td>
                                        <td>".str_replace('Delivered-', '', $code)."</td>
                                        <td>-</td>
                                    </tr>";
                                } else if (strpos($code, 'Delivered-') !== false) {
                                    echo "<tr>
                                        <td class='coupon-code'>$count</td>
                                        <td class='email'>$email</td>
                                        <td>".str_replace('Delivered-', '', $code)."</td>
                                        <td class='text-success'>Delivered</td>
                                    </tr>";
                                } else {
                                    echo "<tr>
                                        <td class='coupon-code'>$count</td>
                                        <td class='email'>$email</td>
                                        <td>$code</td>
                                        <td class='text-warning'>Pending</td>
                                    </tr>";
                                }
                                $count++;
                            }
                        ?>
                    </tbody> -->
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        $('#createRandomNumbers').on('click', function () {
            $.ajax({
                url : 'generateRandomNumbers.php',
                type: 'POST',
                data: {
                    "number" : $('#number').val()
                },
                success : function(response) {
                    alert(response);
                }
            });
        });

        $('#reg-count').html(<?= $count - 1 ?>);
        $('#winners-count').html(<?= $count - $loosersCount - 1 ?>);
    </script>
</body>
</html>
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
        .email, .coupon-code {
            word-break: break-all;
        }
    </style>
</head>
<body class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Winners</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-sm-inline-flex justify-content-between">
                <input type="search" class="form-control mb-3" name="search" id="search" placeholder="Enter Coupon Code..." style="max-width: 250px;">
                <button class="btn btn-primary mb-3" onclick="location.reload();">Refresh</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Sl.No</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="data">
                        <?php
                            $winnersStr = file_get_contents('winners.json');
                            $winnersJson = json_decode($winnersStr, true);
                            $count = 1;

                            foreach ($winnersJson as $email => $code) {
                                if ($code != '-') {
                                    if (strpos($code, 'Delivered-') !== false) {
                                        echo "<tr>
                                            <td class='sl-no'>$count</td>
                                            <td class='email'>$email</td>
                                            <td class='coupon-code'>".str_replace('Delivered-', '', $code)."</td>
                                            <td class='action'>
                                                <span class='text-success'>Delivered</span>
                                            </td>
                                        </tr>";
                                        $count++;
                                    } else {
                                        echo "<tr>
                                            <td class='sl-no'>$count</td>
                                            <td class='email'>$email</td>
                                            <td class='coupon-code'>$code</td>
                                            <td class='action'>
                                                <button class='btn btn-danger' onclick=delivered('$email')>Mark</button>
                                            </td>
                                        </tr>";
                                        $count++;
                                    }
                                }
                            }
                        ?>
                        <tr class='no-data'>
                            <td colspan='4'>No data found!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.no-data').hide();
        });

        function delivered(email) {
            $.ajax({
                url : 'markAsDelivered.php',
                type: 'POST',
                data: {
                    'email': email
                },
                success : function(response) {
                    location.reload();
                }
            });
        }

        $('#search').on('input', function() {
            str2 = $(this).val();
            count = 0;
            if ($(this).val() != '') {
                $('.data tr .coupon-code').each(function(key, val) {
                    str1 = val.innerText.toLowerCase();

                    if(str1.indexOf(str2) != -1) {
                        val.parentNode.style.display = '';
                        $('.no-data').hide();
                    } else {
                        val.parentNode.style.display = 'none';
                        count++;
                    }

                    if (count == $('.data').children().length - 1) {
                        $('.no-data').show();
                    }
                });
            } else {
                $('.data tr .coupon-code').each(function(key, val) {
                    val.parentNode.style.display='';
                });
                $('.no-data').hide();
            }
        });
    </script>
</body>
</html>
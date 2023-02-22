<!DOCTYPE html>
<html lang="en">

<head>
    <title>How to Import and Export CSV files using PHP and MySQL - onlinecode</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
</head>


<body>
    <div class="container mt-5">
        <div class="mb-4">
            <div>
                <h2>Import and export csv file</h2>
            </div>
            <div>
                <a class="btn btn-danger" href="export.php">Export</a>
                <button class="btn btn-primary d-inline" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</button>
            </div>
        </div>
        <table id="tables" class="table mt-5">
            <thead>
                <tr>

                    <th>Number</th>
                    <th>Product Id</th>
                    <th>User</th>
                    <th>Riview</th>
                    <th>Compound</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connection.php');
                $sql = 'SELECT * FROM compound ORDER BY id desc';
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['user']; ?></td>
                        <td><?php echo $row['riview']; ?></td>
                        <td><?php echo $row['compound']; ?></td>

                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Csv file</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <form action="import.php" method="post" enctype="multipart/form-data">
                                <div>
                                    <div>
                                        <input class="form-control" type="file" name="csv_file" id="csv_file" data-icon="false">
                                    </div>
                                </div>
                                <div>
                                    <input class="btn btn-primary mt-3" type="submit" value="Upload file" id="upload_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#tables').DataTable();
    });
</script>

</html>
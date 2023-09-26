<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-5 ">
                    <form class="form-control" method="post" action="processes/transactionsProcess.php">
                        <input type="text" name="amount" placeholder="Enter amount"  class="form-control">
                        <button type="submit" name="withdraw" class="btn btn-primary mt-5">Withdraw</button>
                        <a href="dashBoard.php" class="btn btn-primary mt-5">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    require_once('NaiveBayesClassifier.php');

    $classifier = new NaiveBayesClassifier();
    $spam = Category::$SPAM;
    $ham = Category::$HAM;

//     $classifier -> train('Have a pleasurable stay! Get up to 30% off + Flat 20% Cashback on Oyo Room' . 
//             ' bookings done via Paytm', $spam);
//     $classifier -> train('Lets Talk Fashion! Get flat 40% Cashback on Backpacks, Watches, Perfumes,' .
//             ' Sunglasses & more', $spam);

//     $classifier -> train('Opportunity with Product firm for Fullstack | Backend | Frontend- Bangalore', $ham);
//     $classifier -> train('Javascript Developer, Fullstack Developer in Bangalore- Urgent Requirement', $ham);

    // $category = $classifier -> classify('Get the 90% discount now!!!!!');
    // echo $category;

    
    
    $tokenize = $classifier -> tokenize($email);
    $category = $classifier -> decide($tokenize);

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Naive Bayes Classifier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="app.css" />
    <style>
        .card {
            box-shadow: 0 18px 35px rgba(50,50,93,.1), 0 8px 15px rgba(0,0,0,.07);
            border-radius:20px;
            height: 600px;
        }
        .col-8 .card {
            height:200px;
        }
        .top{
            position: relative;
        }
        .bottom{
            position: absolute;
            margin-top:-80px;
        }
        .top .card {
            background-color: rgb(0,176,240);
        }
        .top h2 {
            color: white;
        }
        .btn{
            color: white;
            background-color: rgb(0,188,212);
        }
    </style>
</head>
<body>
    <div class="container-fluid top">
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <div class="card p-3 ">
                    <h2 class="text-center">Naive Bayes Classifier</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bottom">
        <div class="row">
            <div class="col-4">
                <div class="card p-3">
                    <form action="main.php" method="POST">
                        <div class="form-group">
                            <h4 for="emailInput">Input Email</h4>
                            <textarea class="form-control" id="emailInput" rows="8" name="email"></textarea>
                        </div>
                        <input class="btn" type="submit" value="submit"> 
                    </form>
                    <h1>
                    </h1>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3">
                    <div>
                        <h4>Hasil Tokenisasi: </h4>
                        <div class="form-group">
                            <textarea class="form-control" id="emailInput" rows="4" name="email"><?php echo $email;?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" id="emailInput" rows="4" name="email"><?php if(empty($tokenize)){echo "";} 
                                else echo json_encode($tokenize);?>
                            </textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3">
                    <div>
                        <h4>Hasil Klasifikasi:</h4>
                        <textarea class="form-control" id="emailInput" rows="8" name="email"><?php if(empty($category)){echo "";
                            } else echo $category;?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



<?php
error_reporting(0);
session_start();


if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}


if (isset($_POST['newBlog'])) {
    header("location: newBlog.php");
    exit;
}

require __DIR__ . "/partials/_dbcon.php";

            $query = "SELECT * FROM textfields";

            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
            $textfieldId = $row["textfield_id"];
            $textContent = $row["textContent"];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Gulpener Turnclub</title>
	  <link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/algemeen.css">
    <link rel="stylesheet" href="../styling/preface.css">
    <link rel="stylesheet" href="../styling/longImage.css">
    <link rel="stylesheet" href="../styling/blog.css">
    <link rel="stylesheet" href="../styling/lesInformatie.css">

    <script src="../scripts/header.js" defer></script>
    <script src="../scripts/deletePostConfirm.js"> defer</script>
</head>
<body>
<?php require __DIR__ . "/partials/largeHeader.php"; 
	?>
	
    
        
    
    <div class="preface">
<?php
echo "<div class='column'><img class='images' src=../assets/images/pageimages/pageImage_2.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=2>Edit Image</a>";
}
}
echo "</div>";

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];	
	
if ($textfieldId == 1){
    echo "<div class='column'><span class='text'>" . $textContent . "</span>";
    }
}
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=1>Edit textfield</a>";
        }
    }
?>
    </div></div>

<?php
echo "<div class='column'><img class='longImage' src=../assets/images/pageimages/pageImage_5.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=5>Edit Image</a></div>";
}
}
echo "</div></div>";

?>
<span  id="info"class="smallHeader">Informatie</span>

<div class="theContainer">
<div class="lesInformatieContainer">
<?php
echo "<div class='lesInformatie'>";

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
	
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 2){
echo "<span class='lesInformatieTitle'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 3){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 4){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 5){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }}
}
}
echo "<div class='informatieLine'></div>";
echo "<img class='informatieImage' src='../assets/images/pageimages/pageImage_6.png' alt='pageImage_6'>";  
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    
    echo "<a href=editImage.php?imageToEdit=6>Edit Image</a>";
}
}
echo "</div></div>";
echo "<div class='lesInformatieContainer'>";

echo "<img class='informatieImage' src=../assets/images/pageimages/pageImage_7.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=7>Edit Image</a>";
}
}
require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 6){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
}
    }
}
if ($textfieldId == 7){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
}
    }
}
}
echo "<div class='informatieLine'></div>";
echo "</div></div></div>";


?>

<span  id="algemeen"class="smallHeader">Algemeen</span>
<div class="containerAlgemeen">
    <div class="innerContainerAlgemeen">
    <div class="bulletPoints">
        <?php
        require __DIR__ . "/partials/_dbcon.php";

        $query = "SELECT * FROM textfields";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
        $textfieldId = $row["textfield_id"];
        $textContent = $row["textContent"];
        
        if ($textfieldId == 10){
        echo "<span class='bulletPointsTitle'>" . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }
            }
        }
        if ($textfieldId == 11){
            echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }
                }
            }
        if ($textfieldId == 12){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
        }
        if ($textfieldId == 13){
            echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }
                }
        }
    }
        
        ?>

    </div>
    <div class="bulletPoints">
        <?php
    require __DIR__ . "/partials/_dbcon.php";

    $query = "SELECT * FROM textfields";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
    $textfieldId = $row["textfield_id"];
    $textContent = $row["textContent"];
    
    if ($textfieldId == 14){
    echo "<span class='bulletPointsTitle'>" . $textContent . "</span>";
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }}
    }
    if ($textfieldId == 15){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
        }
    if ($textfieldId == 16){
    echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }}
    }
    if ($textfieldId == 17){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
    }
    if ($textfieldId == 18){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
        }
        if ($textfieldId == 19){
            echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
                }
        }}
}
        ?>
    </div>

    

</div>

<div class="informatieLine" style="margin-bottom:30px;"></div>
<?php
echo "<div class='column'><img class='longImage' src=../assets/images/pageimages/pageImage_8.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=8>Edit Image</a></div>";
}}
?>

</div>

        <form method="POST" action="index.php">

    <span  id="news" onclick="window.location.href='blog.php';" class="smallHeader">Laatste nieuws</span>
            <div class='blogIndex'>
                

            <?php

    require __DIR__ . "/partials/_dbcon.php";

    $query = "SELECT * FROM blog
    order by blog_id desc";

    $result = $mysqli->query($query);


    $count = 0;
    while (($row = $result->fetch_assoc()) && $count < 3) {
        $count++;
        $blogId = $row["blog_id"];
        $title = $row["title"];
        $content = $row["content"];
        $date = $row["date"];
        
        echo "<div class='blogPost'>";
        $imagePath = "../assets/images/blogimages/$blogId.png";
        if (file_exists($imagePath)) {
            echo "<div><img src='$imagePath' alt='$title' class='blogImage' ><br>";
        }
        echo "<div class='blogTitle'><span>" . $title .  "</span></div>";
        echo "<div class='blogTextContainer'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
        
        echo "<div class='blogDate'> <span>" . $date . "</span><br>";
        echo "<a class='readPostRedirect' href='blogPost.php?postToView=" . $blogId . "'><div class='readPostContainer'><div class='readPost'>Lees meer</div></div></a>";

        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
        echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
        echo "<a onclick='check()' href=deletePost.php/?posttodelete=" . $blogId . ">Delete post</a> </div>";
    
    }
        }
        echo "<div class='filler'></div></div></div>";

    }

            ?>
            <div onclick="window.location.href='blog.php';" style="justify-content: center;" class="blogSpecial">
            <div class="specialTextContainer">
                <span class="blogTitle">alles zien</span>
                </div>
            </div>
            </div>
        </form>

        <footer>
            <div class="columnFooter">
                <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 8){
echo "<span class='footerTitle'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 9){
echo "<span class='footerText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
}
                ?>
                </div>
                <?php require __DIR__ . "/partials/footer.php"; ?>
                
        </footer>
    </div>
</body>
</html>
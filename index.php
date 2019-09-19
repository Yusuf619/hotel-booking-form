<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<!-- bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- STYLING-->
<link rel="stylesheet" type="text/css" href="css/styles.css">
<script src="https://kit.fontawesome.com/ac87d8aca0.js"></script>
<link rel="shortcut icon " type="image/png" href="img/hotel.png">
<title> Hotel Booking Form</title>
</head>
<body>

<!-- NAV BAR START -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#"><i class="fas fa-hotel"></i> Hotels</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item active">
<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#form">Get Booking!</a>
</li>

</ul>
</div>
</nav>
<!-- NAVBAR END -->

<!-- SLIDE SHOW START -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
<div class="carousel-item active">
<img class="d-block w-100" src="img/hotel1.jpg" alt="First slide">
<div class="carousel-caption d-none d-md-block">
<h5>Cheap, Affordable Hotels</h5>
<p>Price range from R1000 - R5000 p/n</p>
</div>
</div>
<div class="carousel-item">
<img class="d-block w-100" src="img/hotel2.jpg" alt="Second slide">
<div class="carousel-caption d-none d-md-block">
<h5>Located in:</h5>
<p>Cpt, Drbn, Jhb</p>
</div>
</div>
<div class="carousel-item">
<img class="d-block w-100" src="img/hotel3.jpg" alt="Third slide">
<div class="carousel-caption d-none d-md-block">
<h5>Book Now!</h5>
<p>The availabilty is running out!</p>
</div>
</div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
<!-- SLIDE SHOW END -->

<!-- CONTENT START -->
<div class="price" >

<p id="inn"> <img src="img/holidayin.jpeg" alt="hotel-names"class="image"> Holiday Inn is a British-owned American brand of hotels, and a subsidiary of InterContinental Hotels Group. Founded as a U.S. motel chain, it has grown to be one of the world's largest hotel chains, with 1,173 active hotels and over 214,000 bedrooms as of September 30, 2018</p>
</div>


<div class="price" >
<p id="rad"><img src="img/radisson.jpeg" alt="hotel-names"class="image"> Radisson Blu is a worldwide upper upscale hotel brand. Its hotels are found in major cities, key airport gateways and leisure destinations. The tagline of the brand is ‘Feel the difference’. This is also reflected in the brand's focus points: memorable, stylish and purposeful</p>
</div>

<div class="price" >

<p id="city"><img src="img/citylodge.jpeg" alt="hotel-names"class="image">The hotel is within walking distance not only of the Waterfront’s main attractions, but also of the Central Business District of the Mother City. It has easy access to the N2 freeway and is only fifteen minutes by car from the Cape Town International Airport. Other facilities include a sundowner bar, a boardroom (for meetings and conferences), an internet café, a fitness room, wireless internet, fax and photocopy services, dry cleaning and a shuttle service. A very apt nautical theme is reflected in the hotel’s décor.</p>
</div>

<div class="price3">

<p id="town"><img src="img/townlodge.jpeg" alt="hotel-names"class="image">The hotel is ideally located near many conveniences and features a restaurant on the property. It is 20 minutes from the Cape Town International Airport, next to the Parc du Cap office park in Tyger Valley, and near the Bellville CBD, University of Stellenbosch Business School, Bellville Golf Club, Bellville Velodrome athletics and conference centre and the Tyberberg Nature Reserve.</p>
</div>


<div id="book"  >
<h2>Start Your Booking!</h2>

<div id='form' >
<form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<input type="text" name="firstname" placeholder='First Name' required>

<input type="text" name="surname"placeholder='Surname' required>


<input type="date" name="indate" placeholder='indate' required>

<!-- <label>Check Out : </label> -->

<input type="date" name="outdate" placeholder='outdate' required>

<select name="hotelname" required>
<option value="Holiday Inn">Holiday Inn</option>
<option value="Radison">Radison</option>
<option value="City Lodge">City Lodge</option>
<option value="Town Lodge">Town Lodge</option>
</select>

<button class="submit" name="submit" type="submit">Submit</button>


</form>
</div>
</div>

<!-- CONTENT END -->


<!-- PHP START -->

<?php
require_once "connect.php";
echo $conn->error;

$sql = "CREATE TABLE IF NOT EXISTS bookings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(50),
surname VARCHAR(50),
hotelname VARCHAR(50),
indate VARCHAR(30),
outdate VARCHAR(30),
booked INT(4))";


$conn ->query($sql);

if (isset($_GET['error']) && $_GET['error'] == 'timestamp') {

?>

<div class='panel panel-default'>
<h1>
You must select at least  1 day 
</h1>
</div>

<?php
}



if (isset($_POST['submit'])) {
$_SESSION['firstname']= $_POST['firstname'];
$_SESSION['surname']= $_POST['surname'];
$_SESSION['hotelname']= $_POST['hotelname'];
$_SESSION['indate']= $_POST['indate'];
$_SESSION['outdate']= $_POST['outdate'];


//calculate duration of user's stay at hotel
$datetime1 = new DateTime($_SESSION['indate']);
$datetime2 = new DateTime($_SESSION['outdate']);
$interval = $datetime1->diff($datetime2);

$interval->format('%d');

$checkInStamp = strtotime($_SESSION['indate']);
$checkOutStamp = strtotime($_SESSION['outdate']);
if ($checkInStamp - $checkOutStamp > 86400 || $checkInStamp == $checkOutStamp) {
header("Location: ?error=timestamp");
exit;
}

$daysbooked = $interval->format('%d');
$value;

switch(isset($_SESSION['hotelname'])){
case 'Holiday Inn':
$value = $daysbooked * 200;
break;

case 'Radison':
$value = $daysbooked * 100;
break;

case 'City Lodge':
$value = $daysbooked * 400;
break;

case 'Town Lodge':
$value = $daysbooked * 150;
break;

default:
return "ERROR!";
}

$firstname = $_POST['firstname'];
$surname = $_POST['surname'];

$result = mysqli_query($conn,"SELECT hotelname, indate, outdate, firstname, surname FROM bookings WHERE firstname='$firstname' && surname='$surname'"); 
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {    
echo "<div class='duplicate'><i class='fas fa-exclamation-triangle'></i> <br> You already have a booking. <br> Firstname: ". $row['firstname'] . "<br>
Lastname: " . $row['surname'].
"<br> Start Date: " . $row['indate'].
"<br> End Date: " . $row['outdate'].
"<br> Hotel Name: " . $row['hotelname'].
"<br>" . $interval->format('%r%a days') . "<br> Total: R " . $value ."</div>";
break; } 
}


echo '<div class="return">'. "<br> Firstname : ".  $_SESSION['firstname']."<br>".
"surname : ".  $_SESSION['surname']."<br>".
"Start Date : ". $_SESSION['indate']."<br>".
"End Date : ". $_SESSION['outdate']."<br>".
"Hotel Name : ". $_SESSION['hotelname']."<br>".
$interval->format('%r%a days') ."<br>".
"Total R" . $value ;

echo "<form role='form' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . " method='post'>
<br>
<button name='confirm' type='submit'> Confirm </button> </form>".'</div>';


}

if(isset($_POST['confirm'])){
//Preparing and binding a statement
//prepare is method, this way we only pass the query once and then the values
$stmt=$conn->prepare("INSERT INTO bookings(firstname,surname,hotelname,indate,outdate) VALUES (?,?,?,?,?)");
//also part of preparing & binding these values to the questions marks.
$stmt->bind_param('sssss', $firstname,$surname,$hotelname,$indate,$outdate);
$firstname=$_SESSION['firstname'];
$surname=$_SESSION['surname'];
$hotelname=$_SESSION['hotelname'];
$indate=$_SESSION['indate'];
$outdate=$_SESSION['outdate'];
$stmt->execute();
echo '<div id="confirmed">'."Booking confirmed! ".'</div>';

}

?>
<!-- PHP END -->

<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

<!-- Footer Elements -->
<div class="container">

<!--Grid row-->
<div class="row">

<!--Grid column-->
<div class="col-lg-2 col-md-12 mb-4">

<!--Image-->
<div class="view overlay z-depth-1-half">
<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="img-fluid"
alt="">
<a href="">
<div class="mask rgba-white-light"></div>
</a>
</div>

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-6 mb-4">

<!--Image-->
<div class="view overlay z-depth-1-half">
<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(78).jpg" class="img-fluid"
alt="">
<a href="">
<div class="mask rgba-white-light"></div>
</a>
</div>

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-6 mb-4">

<!--Image-->
<div class="view overlay z-depth-1-half">
<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(79).jpg" class="img-fluid"
alt="">
<a href="">
<div class="mask rgba-white-light"></div>
</a>
</div>

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-12 mb-4">

<!--Image-->
<div class="view overlay z-depth-1-half">
<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(81).jpg" class="img-fluid"
alt="">
<a href="">
<div class="mask rgba-white-light"></div>
</a>
</div>

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-6 mb-4">

<!--Image-->
<div class="view overlay z-depth-1-half">
<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(82).jpg" class="img-fluid"
alt="">
<a href="">
<div class="mask rgba-white-light"></div>
</a>
</div>

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-6 mb-4">

<!--Image-->
<div class="view overlay z-depth-1-half">
<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(84).jpg" class="img-fluid"
alt="">
<a href="">
<div class="mask rgba-white-light"></div>
</a>
</div>

</div>
<!--Grid column-->

</div>
<!--Grid row-->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- FONT AWESOME KIT -->


</body>
</html>
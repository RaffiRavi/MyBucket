<?php
// Include database connection
include 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data dari form tersedia
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($username && $email && $password) {
        // Enkripsi password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Siapkan statement SQL untuk memasukkan data ke tabel users
        $sql = "INSERT INTO tb_logreg (username, email, password) VALUES (?, ?, ?)";

        // Gunakan prepared statements untuk mencegah SQL injection
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            // Eksekusi statement
            if ($stmt->execute()) {
                echo "Registrasi berhasil!";
            } else {
                echo "Error saat eksekusi: " . $stmt->error;
            }

            // Tutup statement
            $stmt->close();
        } else {
            echo "Error dalam menyiapkan statement: " . $conn->error;
        }
    } else {
        echo "Error: Semua kolom harus diisi.";
    }
}


// Close the database connection
$conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>MyBucket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/logo1.jpeg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
			      	</div>
					  <form action="register.php" method="post" class="signin-form">
							<div class="form-group mb-3">
								<label class="label" for="username">Username</label>
								<!-- Tambahkan atribut name dan id -->
								<input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group mb-3">
								<label class="label" for="email">Email</label>
								<!-- Tambahkan atribut name dan id -->
								<input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
							</div>
							<div class="form-group mb-3">
								<label class="label" for="password">Password</label>
								<!-- Tambahkan atribut name dan id -->
								<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
							</div>
							</form>

		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0"></label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#"></a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Do you have an account <a href="login.php">Sign In Here</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


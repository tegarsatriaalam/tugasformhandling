<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling and Validation</title>
</head>
<body>
    <h2>form handling dan validation</h2>
    
    <?php
    // Define variables to store form data
    $nim = $nama = $alamat = $email = $nohp = $prodi = "";

    // Define variables to store validation error messages
    $nimErr = $namaErr = $alamatErr = $emailErr = $nohpErr = $prodiErr = "";

    // Function to sanitize input data
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if the form is submitted using POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate NIM
        if (empty($_POST["nim"])) {
            $nimErr = "* NIM is required";
        } else {
            $nim = sanitize_input($_POST["nim"]);
        }

        // Validate Nama
        if (empty($_POST["nama"])) {
            $namaErr = "* Nama is required";
        } else {
            $nama = sanitize_input($_POST["nama"]);
        }

        // Validate Alamat
        if (empty($_POST["alamat"])) {
            $alamatErr = "* Alamat is required";
        } else {
            $alamat = sanitize_input($_POST["alamat"]);
        }

        // Validate Email
        if (empty($_POST["email"])) {
            $emailErr = "* Email is required";
        } else {
            $email = sanitize_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "* Invalid email format";
            }
        }

        // Validate No HP
        if (empty($_POST["nohp"])) {
            $nohpErr = "* No HP is required";
        } else {
            $nohp = sanitize_input($_POST["nohp"]);
        }

        // Validate Prodi
        if (empty($_POST["prodi"])) {
            $prodiErr = "* Prodi is required";
        } else {
            $prodi = sanitize_input($_POST["prodi"]);
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        NIM: <input type="text" name="nim" value="<?php echo $nim; ?>"> <span style="color: red;"><?php echo $nimErr; ?></span><br>
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"> <span style="color: red;"><?php echo $namaErr; ?></span><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $alamat; ?>"> <span style="color: red;"><?php echo $alamatErr; ?></span><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>"> <span style="color: red;"><?php echo $emailErr; ?></span><br>
        No HP: <input type="text" name="nohp" value="<?php echo $nohp; ?>"> <span style="color: red;"><?php echo $nohpErr; ?></span><br>
        Prodi: <input type="text" name="prodi" value="<?php echo $prodi; ?>"> <span style="color: red;"><?php echo $prodiErr; ?></span><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Display submitted data if there are no validation errors
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $nimErr == "" && $namaErr == "" && $alamatErr == "" && $emailErr == "" && $nohpErr == "" && $prodiErr == "") {
        echo "<h2>Submitted Information:</h2>";
        echo "NIM: " . $nim . "<br>";
        echo "Nama: " . $nama . "<br>";
        echo "Alamat: " . $alamat . "<br>";
        echo "Email: " . $email . "<br>";
        echo "No HP: " . $nohp . "<br>";
        echo "Prodi: " . $prodi . "<br>";
    }
    ?>

</body>
</html>

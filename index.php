<?php
/* nama server kita */
$servername = "localhost";

/* nama database kita */
$database = "sign_lumintu";

/* nama user yang terdaftar pada database (default: root) */
$username = "root";

/* password yang terdaftar pada database (default : "") */
$password = "";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);



if (isset($_POST["tujuan"])) {

    $tujuan = $_POST["tujuan"];

    if ($tujuan == "LOGIN") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query_sql = "SELECT * FROM pendaftaran 
                                   WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $query_sql);
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $user_check = mysqli_num_rows(
            mysqli_query($conn, "select * from pendaftaran where email = '$email'")
        );
        if ($user_check > 0) {
            echo "Maaf email anda telah terdaftar";
        } else {
            $query_sql = "INSERT INTO pendaftaran (username, email, password) 
                                               VALUES ('$username', '$email', 'password')";

            if (mysqli_query($conn, $query_sql)) {
                echo "
                        <h1>Username $username berhasil terdaftar</h1>
                    ";
            }
        }
    }
}

// tutup koneksi
mysqli_close($conn);

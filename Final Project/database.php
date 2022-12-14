
<!-- NAME:DAXIL PATEL -->
<!-- STUDENT ID:200520270 -->
<!-- creating database -->
<?php
class database
{
    // adding SQL server
    public $servername = "172.31.22.43";
    public $username = "Daxil200520270";
    public $password = "xKdtjPVJY5";
    public $database = "Daxil200520270";
    public $con;

    // creating connections

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect:" . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }

    //the below is the function to insert data from Home page
    public function insertData($post)
    {
            $Email = $this->con->real_escape_string($_POST['Email']);

            $query = "SELECT ID FROM admins WHERE Email = '$Email'";
            $result = $this->con->query($query);
            $records = mysqli_num_rows($result);
            if ($records > 0)
            {

                foreach ($result as $row)
                {
                    header("Location:join.php?msg5=sameemail");
                    $_SESSION['ID'] = $row['ID'];

                }
            }
        else
        {
            $FirstName = $this->con->real_escape_string($_POST['FirstName']);
            $LastName = $this->con->real_escape_string($_POST['LastName']);
            $Email = $this->con->real_escape_string($_POST['Email']);
            $Telephone = $this->con->real_escape_string($_POST['Telephone']);
            $Passwrd = hash('sha256', $_POST['Passwrd']);
            $query = "INSERT INTO admins(FirstName,LastName,Email,Telephone,Passwrd) VALUES ('$FirstName','$LastName','$Email','$Telephone','$Passwrd')";
            $sql = $this->con->query($query);
            if ($sql == true)
            {
                // to show message on header if successfully data inserted.
                header("Location:saveadmin.php?msg1=insert");

            } else
            {
                // error if there is something wrong in the code
                echo "Cant add your profile";
                // echo to display the error
            }
        }
    }





    //This will fetch all the data from Sql  (or READ)
    public function displayData()
    {
        $query = "SELECT * FROM admins";
        // using limit 1 to only load 1 inserted data.
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;

            }
            return $data;
        } else {


            echo "no profile found!";


        }
    }



    public function loginCheck()
    {
        $Email = $this->con->real_escape_string($_POST['Email']);
        $Passwrd = hash('sha256', $_POST['Passwrd']);
        $query = "SELECT ID FROM admins WHERE Email = '$Email' AND Passwrd = '$Passwrd'";
        $result = $this->con->query($query);
        $records = mysqli_num_rows($result);
        if ($records > 0) {

            foreach ($result as $row) {
                session_start();
                $_SESSION['ID'] = $row['ID'];
                Header('Location:view.php');
            }
        } else {
            echo '<p>Some error occur while logging in</p>';
        }
    }

    // update and read
    public function displayRecordByID($ID)
    {

        $query = "SELECT * FROM admins WHERE ID = '$ID'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "No profile found !!";
        }
    }

    //Creating update function
    public function updateRecord($postData)
    {
        $FirstName = $this->con->real_escape_string($_POST['uFirstName']);
        $LastName = $this->con->real_escape_string($_POST['uLastName']);
        $Email = $this->con->real_escape_string($_POST['uEmail']);
        $Telephone = $this->con->real_escape_string($_POST['uTelephone']);
        $Passwrd = hash('sha256', $_POST['Passwrd']);
        $ID = $this->con->real_escape_string($_POST['ID']);

        if (!empty($ID) && !empty($postData)) {
            $query = "UPDATE admins SET FirstName = '$FirstName',LastName = '$LastName', Email = '$Email',Telephone='$Telephone', Passwrd = '$Passwrd' WHERE ID = '$ID'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                // to show message on header if successfully updated data that were inserted in the edit page

                header("Location:view.php?msg2=update");
            } else {
                // error if there is something wrong in the code
                echo "Could not update your profile";
            }
        }
    }

    //Creating Delete function
    public function deleteRecord($ID)
    {
        $query = "DELETE  FROM admins WHERE ID = '$ID'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            // to show message on header if successfully deleted data that was inserted
            header("Location:view.php?msg3=delete");
        } else {
            // error if there is something wrong in the code
            echo "Could not delete your profile";
        }
    }


    public function insertfeedbackData($post)
    {
        $fname = $this->con->real_escape_string($_POST['fname']);
        $rating = $this->con->real_escape_string($_POST['rating']);
        $coment = $this->con->real_escape_string($_POST['coment']);

        $query = "INSERT INTO fb_admins(fname,rating,coment) VALUES ('$fname','$rating','$coment')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            // to show message on header if successfully data inserted.
            header("Location:feedback.php?msg4=insert");

        } else {
            // error if there is something wrong in the code
            echo "Can`t add your profile";
            // echo to display the error
        }
    }

    public function displayfeedbackData()
    {
        $query = "SELECT * FROM fb_admins";
        // using limit 1 to only load 1 inserted data.
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;

            }
            return $data;
        } else {
            echo "there is no comment";

        }
    }

    public function displayfeedbackRecordByID($fb_ID)
    {
        // adding query to display our data
        $query = "SELECT * FROM fb_admins WHERE fb_ID = '$fb_ID'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "No profile found !!";
        }
    }



    public function deletefeedbackRecord($fb_ID)
    {

        session_start();
        if (!isset($_SESSION['ID'])) {
            header('Location:signin.php');
            exit();
        } else {
            $query = "DELETE  FROM fb_admins WHERE fb_ID = '$fb_ID'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                // to show message on header if successfully deleted data that was inserted
                header("Location:feedback.php?msg3=update");
            } else {
                // error if there is something wrong in the code
                echo "Could not delete your profile";
            }
        }
    }




    public function updatefeedbackRecord($postData)
    {
        $fname = $this->con->real_escape_string($_POST['ufname']);
        $rating = $this->con->real_escape_string($_POST['urating']);
        $coment = $this->con->real_escape_string($_POST['ucoment']);

        $fb_ID = $this->con->real_escape_string($_POST['fb_ID']);

        if (!empty($fb_ID) && !empty($postData)) {
            $query = "UPDATE fb_admins SET fname = '$fname',rating = '$rating', coment = '$coment' WHERE fb_ID = '$fb_ID'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                // to show message on header if successfully updated data that were inserted in the edit page

                header("Location:feedback.php?msg2=update");
            } else {
                // error if there is something wrong in the code
                echo "Could not edit your Feedback";
            }
        }
    }


}
?>
<!-- end of code -->

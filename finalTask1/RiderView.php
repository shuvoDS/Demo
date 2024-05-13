<!DOCTYPE HTML>
<html>
<body>
<?php
class RiderView {
    public function renderRiders($riders) {
        echo "<table border='1'>";
        echo "<tr><th>Rider ID</th><th>Name</th><th>Email</th><th>Phone</th><th>DOB</th><th>Gender</th><th>Address</th><th>Actions</th></tr>";
        foreach ($riders as $rider) {
            echo "<tr>";
            echo "<td>".$rider['rider_id']."</td>";
            echo "<td>".$rider['name']."</td>";
            echo "<td>".$rider['email']."</td>";
            echo "<td>".$rider['phone']."</td>";
            echo "<td>".$rider['dob']."</td>";
            echo "<td>".$rider['gender']."</td>";
            echo "<td>".$rider['address']."</td>";
            echo "<td>
                    <a href='?action=delete&id=".$rider['rider_id']."'>Delete</a> |
                    <a href='?action=edit&id=".$rider['rider_id']."'>Update</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderUpdateForm($rider) {
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='rider_id' value='".$rider['rider_id']."'>";
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' value='".$rider['name']."'><br>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='text' name='email' value='".$rider['email']."'><br>";
        echo "<label for='phone'>Phone:</label>";
        echo "<input type='text' name='phone' value='".$rider['phone']."'><br>";
        echo "<label for='dob'>DOB:</label>";
        echo "<input type='date' name='dob' value='".$rider['dob']."'><br>";
        echo "<label for='gender'>Gender:</label>";
        echo "<input type='text' name='gender' value='".$rider['gender']."'><br>";
        echo "<label for='address'>Address:</label>";
        echo "<input type='text' name='address' value='".$rider['address']."'><br>";
        echo "<input type='submit' name='update' value='Update'>";
        echo "</form>";
    }
}
?>
</body>
</html>

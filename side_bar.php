<div class="userNavbar">
    <div class="title">
        <a class="titleName" href=""> CESA Voting System</a>
    </div>

    <div class="navbarImg">
        <img src="./images/vote.png" alt="Logo"/>
    </div>

    <div class="user">
        
        <h1 class="username">
        <?php
        require 'admin/dbcon.php';
        try {
            $query = $conn->query("SELECT firstname , lastname from voters where voters_id ='" . $_SESSION['voters_id'] . "'");
            $row = $query->fetch_array();
        ?>
             <i class="fa fa-arrow fa-fw"></i>Welcome: <?php echo $row['firstname'] . " " . $row['lastname']; ?>
        <?php
        } catch (Exception $e) {
            echo '<i class="fa fa-arrow fa-fw"></i>Error occured : Please reload page';
        }
        ?>               
        </h1>
    </div>
</div>
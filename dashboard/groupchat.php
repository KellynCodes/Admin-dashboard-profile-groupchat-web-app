<?php include "header.php";

if(isset($_POST['send'])){
    $chat = $_POST['chat'];

    $sql = "INSERT INTO chat(username,message) values('$username', '$chat')";
    $execute = mysqli_query($conn,$sql);
}

?>

<div class="container" style="margin-top: 100px;">
<center>
    <h2>GrouP ChaT</h2>
</center>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 card shadow p-4 mt-5" style="height: 400px;  overflow-y: scroll;">

        <?php 
            $sql1 = "SELECT * FROM chat";
            $exe = mysqli_query($conn,$sql1);

            while($row = mysqli_fetch_array($exe)){
                $username = $row['username'];
                $message = $row['message'];
            
        ?>

        <div class="shadow p-2 text-center rounded-2 mb-3">
            <b class="text-info "><?php echo $username ?> </b><br>
            <b><?php echo $message ?></b>
        </div>
<?php } ?>

       </div>
    </div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 mb-5">
   <form action="" method="post">
   <input type="text" class="input" name="chat" placeholder="Type here..." required>
    <button class="button" name="send"><i class="bi-send-check-fill"></i></button>
   </form>
    
</div>
</div>

</div>




<?php include "footer.php " ?>
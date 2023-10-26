<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
<?PHP
        include('../includes/connect.php');
        $select="SELECT user_name,textarea,post_date FROM contact order by   post_date   DESC";
        $result=mysqli_query($con, $select);
        ?>
        <table class='table table-bordered w-50 text-center mx-5'>
        <thead class="bg-primary "  >
            <tr>
                <th>User name</th>
                <th > comment</th>
                <th>post date</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
        <?php
        while($row=mysqli_fetch_assoc($result) ){
            $name=$row['user_name'];
            $textarea=$row['textarea'];
            $post_date=$row['post_date'];
            ?>
            
        
            <tr>
                <td> <?php echo $name ?></td>
                <td ><?php echo $textarea ?></td>
                <td> <?php echo $post_date?></td>
            </tr>
       

            <?php
        }
        ?>
             </tbody>
        </table>
  <center> <button  class="mx-4" ><a href="index.php"> back</a> </button></center> 
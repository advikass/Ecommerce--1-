<h3 class="text-center text-success mb-5">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
        $get_payments="Select * from `user_table`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
       
if($row_count==0){
    echo "<h2 class=' text-danger text-center mt-5 w-25 m-auto'>No Users</h2>";
}else{
    echo "<tr>
    <th>Sl No</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Address</th>
    <th>Mobile Number</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $user_name=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$user_name</td>
        <td>$user_email</td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href='index.php?delete_user=$user_id' class='text-dark '><i class='fa-solid fa-trash'></i></a></td>

        </tr>";
    }
}

        ?>
        
        
    </tbody>


</table>




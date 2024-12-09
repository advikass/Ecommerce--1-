<?php
if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];
    $get_brands="Select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}
if(isset($_POST['update_cat'])){
    $cat_title=$_POST['brand_title'];
    $update_query="Update `brands` set brand_title='$cat_title' where brand_id=$edit_brand";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
       echo "<script>alert('brand updated successfully')</script>";
       echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }

    
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline w-50 m-auto mb-4 ">
            <label for="brand_title" class="form-label mt-4"><h6>brand Title</h6></label>
            <input type="text" name="brand_title" id="brand_title"  class="form-control" value="<?php echo $brand_title;?>" required="required">
            <input type="submit" value="Update brand" class="btn btn-info px-3 my-3" name="update_cat">
 
        </div>
    </form>
</div>
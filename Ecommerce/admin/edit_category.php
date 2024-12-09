<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $get_categories="Select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
if(isset($_POST['update_cat'])){
    $cat_title=$_POST['category_title'];
    $update_query="Update `categories` set category_title='$cat_title' where category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
       echo "<script>alert('Category updated successfully')</script>";
       echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }

    
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline w-50 m-auto mb-4 ">
            <label for="category_title" class="form-label mt-4"><h6>Category Title</h6></label>
            <input type="text" name="category_title" id="category_title"  class="form-control" value="<?php echo $category_title;?>" required="required">
            <input type="submit" value="Update Category" class="btn btn-info px-3 my-3" name="update_cat">
 
        </div>
    </form>
</div>
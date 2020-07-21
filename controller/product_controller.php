<?php
include_once ('model/database.php');
include_once ('model/product_model.php');

$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='show product';
    }
}

switch ($action){
    case 'show product':
        $productDB = new productDB();
        $list_product= $productDB->get_product();
        include('view/listproduct.php');
        break;
    case 'add_new':
        include('view/addproduct.php');
        break;
    case 'save_product':
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $created_at = filter_input(INPUT_POST, 'created_at');


        //xử lý lưu ảnh trên server

        $image_dir_path=getcwd().'/public/images';
        if (isset($_FILES['image'])){
            $filename=$_FILES['image']['name'];
            if (!empty($filename)){
                $source=$_FILES['image']['tmp_name'];
                $target=$image_dir_path.'/'.$filename;
                move_uploaded_file($source,$target);
                $image=$filename;
            }
        }
        else{
            $image='';
        }
        $productDB = new productDB();
        $productDB->addproduct($title,$description,$image,$created_at);
        $list_product= $productDB->get_product();
        include('view/listproduct.php');
        break;
    case 'delete':
        $productid = filter_input(INPUT_GET, 'productid');
        $productDB = new productDB();
        $productDB->deleteproduct($productid);
        $list_product= $productDB->get_product();
        include('view/listproduct.php');
        break;
    case 'edit':
        $productid = filter_input(INPUT_GET, 'productid');
        $productDB = new productDB();
        $list_product= $productDB->get_product_by_productid($productid);
        include ('view/editproduct.php');
        break;
    case 'save_edit':
        $product = array();
        $product['id']= filter_input(INPUT_POST, 'id');
        $product['title']= filter_input(INPUT_POST, 'title');
        $product['description']= filter_input(INPUT_POST, 'description');
        $product['created_at']= filter_input(INPUT_POST, 'created_at');
        $product['image'] = filter_input(INPUT_POST, 'old_image');

        //xử lý lưu ảnh trên server
        $image_dir_path=getcwd().'/public/images';
        if (isset($_FILES['image'])){
            $filename=$_FILES['image']['name'];
            if (!empty($filename)){
                $source=$_FILES['image']['tmp_name'];
                $target=$image_dir_path.'/'.$filename;
                move_uploaded_file($source,$target);
                $product['image']=$filename;
            }
        }
      //  print_r($product);
        $productDB = new productDB();
        $productDB->updateproduct($product);
        $list_product= $productDB->get_product();
        include('view/listproduct.php');
        break;
    case 'detail':
        $productid = filter_input(INPUT_GET, 'productid');
        $productDB = new productDB();
        $list_product= $productDB->get_product_by_productid($productid);
        include ('view/detailproduct.php');
        break;
    default:
        break;
}

<?php
class Product{

        public function __construct()
    {
        session_start();
        try{
            $this->db=new PDO('mysql:host=localhost;dbname=bookings', 'root', 'root');
        }catch (PDOException $e){
            $e->errorInfo();
        }
    }
    public function shOrdered($id){
            $sql="select orders.*, orders_items.* from orders_items LEFT join orders on orders_items.order_id=orders.id where order_id=$id";
            $result=$this->db->query($sql);
            return $result;
    }
    public function shOrder(){
            $sql="select * from orders order by id desc";
            $result=$this->db->query($sql);
            return $result;
    }
    public function Ordered($order_name, $order_email, $order_phone){

        $order_sql="insert into orders (order_name, order_email, order_phone, order_date) values ('$order_name', '$order_email', '$order_phone', now() )";
        $this->db->query($order_sql);
        echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Your ordered have been successed.</li>";

        $order_id=$this->db->lastInsertId();
        $cart=$_SESSION['cart'];
        unset($_SESSION['cart']);
        foreach ($cart as $key=>$val){
            $sh_sql=$this->db->query("select * from products_items where id='$key'");
            foreach ($sh_sql as $row){
                $item_name=$row['p_name'];
                $item_price=$row['p_price'];
                $od_sql="insert into orders_items (item_name, item_price, item_qty, order_id) values ('$item_name', '$item_price', '$val', '$order_id')";
                $this->db->query($od_sql);

            }

        }

    }
    public function getProductForCart($key){
            $sql="SELECT * FROM products_items where id='$key'";
            $result=$this->db->query($sql);
            return $result;
    }
    public function deleteCategory($id){
            $sql="DELETE FROM category where id in ($id)";
            $this->db->query($sql);
            header("location: /categories");
    }
    public function delProduct($id){
        $sql="delete from products_items where id in ($id)";
        $this->db->query($sql);
        header("location: /dashboard");
    }
    public function productUpdate($p_id, $p_cover_name, $p_cover_tmp, $p_price){
        if($p_cover_name){
           move_uploaded_file($p_cover_tmp, "../config/pCover/$p_cover_name");
            $sql="update products_items set p_cover='$p_cover_name', p_price='$p_price' where id='$p_id'";
            $this->db->query($sql);
            header("location: /dashboard");

        }else{
            $sql="update products_items set p_price='$p_price' where id='$p_id'";
            $this->db->query($sql);
            header("location: /dashboard");
        }
    }
    public function getProductById($p_id){
            $sql=$this->db->query("select * from products_items where id='$p_id'");
            $result=$sql->fetch(PDO::FETCH_ASSOC);
            return $result;
    }
    public function showPublicCat(){
            $sql="select * from category";
            $result=$this->db->query($sql);
            return $result;
    }
    public function showPublicProduct($cat_id){
            if($cat_id){
                $sql=$this->db->query("SELECT * FROM products_items where cat_id='$cat_id'");
                return $sql;
            }else{
                $sql=$this->db->query("select * from products_items");
                return $sql;
            }
    }
    public function showCat(){
            $sql="select * from category";
            $result=$this->db->query($sql);
            return $result;

    }

    public function newCat($cat_name){
            $sql="insert into category (cat_name) values ('$cat_name')";
            $result=$this->db->query($sql);
            if($result){
                echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Saving Success.</li>";
            }
    }
    public function newProduct($cat_id, $p_name, $p_detail, $p_price){
        $sql="INSERT INTO products_items (cat_id, p_name, p_detail, p_price, p_cover, p_date) values ('$cat_id', '$p_name', '$p_detail', '$p_price', 'cover', now())";
        $result=$this->db->query($sql);
        if($result){
            echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Saving Success.</li>";
        }
    }

}